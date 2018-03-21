<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\User;
use App\Customer;
use App\Todo_notice;

class todoController extends Controller
{
    //
    public function todo_list()
    {
        $todo = Todo::where('store',session('store'))
        ->orderBy('start_at','ASC')
        ->get()->all();
        
        foreach ($todo as $key => $value) {
            $todo[$key]['customer'] = Customer::find($value['customer']);
            $todo[$key]['creater'] = User::find($value['creater']);
            $todo[$key]['notice'] = Todo_notice::where('todoId',$value['id'])->get();
            foreach ($todo[$key]['notice'] as $key2 => $value2) {
                if($value2['taker'] != ""){
                    $user = User::find($value2['taker']);
                    $todo[$key]['notice'][$key2]['name'] = $user->name;
                }
            }
        }
        return view('todo/list',compact('todo'));
    }

    public function todo_add($id="")
    {
        $data = "";
        if($id != ""){
            $data = Todo::find($id);
            if($data){
                $customer = Customer::find($data->customer);
                $data->customer = $customer->name."(".$data->customer.")";
                $start_at_arr = explode(' ',$data->start_at);
                $data->start_at = $start_at_arr[0]."T".$start_at_arr[1];
            }else{
                $data = "empty";
            }
        }
        return view('todo/add',compact('data'));
    }

    public function add_todo(Request $request)
    {   
        $notice = $request->notice;
        $data = $request->except('_token','todoId');
        $data['creater'] = session('id');
        $data['store'] = session('store');
        $data['status'] = 0;
        // $data['start_at'] = date('Y-m-d H:i:s',strtotime($data['start_at']));
        // dd($data);
        //取得customer ID
        $one = strpos($data['customer'],'(');
        $data['customer'] =  substr($data['customer'],$one+1,-1);
        
        $res = Todo::create($data)->id;
        if($notice != ""){
            $notice = explode(' ',$notice);
            foreach ($notice as $key => $value) {
                $data2 = array(
                    'content' => $value,
                    'todoId' => $res 
                );
                Todo_notice::create($data2);
            }
        }
        if($res){
            $json_arr['status'] = "200";
            $json_arr['msg'] = "新增完成";
        }else{
            $json_arr['status'] = "204";
            $json_arr['msg'] = "资料库发生错误，请稍后再试";
        };

        return $json_arr;
    }

    public function edit_todo(Request $request)
    {
        $notice = $request->notice;
        $todoId = $request->todoId;
        $data = $request->except('_token','todoId');
        $data['creater'] = session('id');
        $data['store'] = session('store');
        $data['status'] = 0;
        // $data['start_at'] = date('Y-m-d H:i:s',strtotime($data['start_at']));
        //取得customer ID
        $one = strpos($data['customer'],'(');
        $data['customer'] =  substr($data['customer'],$one+1,-1);
        
        $res = Todo::find($todoId)->update($data);
        Todo_notice::where('todoId',$todoId)->delete();

        if($notice != ""){
            $notice = explode(' ',$notice);
            foreach ($notice as $key => $value) {
                $data2 = array(
                    'content' => $value,
                    'todoId' => $todoId 
                );
                Todo_notice::create($data2);
            }
        }

        if($res){
            $json_arr['status'] = "200";
            $json_arr['msg'] = "更新完成";
        }else{
            $json_arr['status'] = "204";
            $json_arr['msg'] = "资料库发生错误，请稍后再试";
        };

        return $json_arr;
    }

    public function chk_todo_item(Request $request)
    {
        $id = $request->id;
        $take = $request->take;
        if($id != ""){
            if(is_numeric($id) && ctype_digit($id)){
                $data = array();
                if($take == 'take'){
                    $data['taker'] = session('id');
                }else{
                    $data['taker'] = NULL;
                }
                
                $res = Todo_notice::find($id)->update($data);
                if($res){
                    $json_arr['status'] = "200";
                    $json_arr['msg'] = session('name');    
                }else{
                    $json_arr['status'] = "204";
                    $json_arr['msg'] = "资料库发生错误，请稍后再试";        
                }
            }else{
                $json_arr['status'] = "400";
                $json_arr['msg'] = "资料形态不正确";    
            }
        }else{
            $json_arr['status'] = "400";
            $json_arr['msg'] = "资料不足";
        }
        echo json_encode($json_arr);
    }

    public function todo_remove(Request $request)
    {
        $id = $request->id;
        $res = Todo::destroy($id);
        if($res){
            $res = Todo_notice::where('todoId',$id)->delete();
            $json_arr['status'] = "200";
            $json_arr['msg'] = "删除成功"; 
        }else{
            $json_arr['status'] = "204";
            $json_arr['msg'] = "资料库发生错误，请稍后再试"; 
        }
        return $json_arr;
    }

    public function todo_done(Request $request)
    {
        $id = $request->id;
        $res = Todo::find($id)->update(array('status'=>'1','done_user'=>session('id'),'done_at'=>date('Y-m-d H:i:s')));
        if($res){
            $json_arr['status'] = "200";
            $json_arr['msg'] = "更新成功"; 
        }else{
            $json_arr['status'] = "204";
            $json_arr['msg'] = "资料库发生错误，请稍后再试"; 
        }
        return $json_arr;
    }

    public function todo_detail($id)
    {   
        $data = Todo::find($id);
        if($data != ""){
            if($data->store != session('store')){
                $data = array();
            }else{
                $data->creater = User::find($data->creater);
                $data->customer = Customer::find($data->customer);
                $notice =Todo_notice::where('todoId',$data->id)->get();
                foreach ($notice as $key2 => $value2) {
                    if($value2['taker'] != ""){
                        $user = User::find($value2['taker']);
                        $notice[$key2]['name'] = $user->name;
                    }
                }
                $data->notice = $notice;
            }
        }else{
            $data = array();
        }
        
        return view('todo/detail',compact('data'));
    }
    
}
