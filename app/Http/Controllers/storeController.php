<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Todo;
use App\Todo_notice;

class storeController extends Controller
{   
    public function index()
    {   

        $todo = Todo::where('store',session('store'))
        ->whereBetween('start_at',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')])
        ->where('status',0)
        ->orderBy('start_at','ASC')
        ->get()->all();
        foreach ($todo as $key => $value) {
            $todo[$key]['customer'] = Customer::find($value['customer']);
            $todo[$key]['notice'] = Todo_notice::where('todoId',$value['id'])->get();
            foreach ($todo[$key]['notice'] as $key2 => $value2) {
                if($value2['taker'] != ""){
                    $user = User::find($value2['taker']);
                    $todo[$key]['notice'][$key2]['name'] = $user->name;
                }
            }
        }
        return view('welcome',compact('todo'));
    }


    public function personnel_list()
    {   
        $users = User::where('store',session('store'))->where('level','>','0')->get();
        // dd($users);
        return view('personnel/list',compact('users'));
    }

    public function personnel_add($id=0)
    {   
        $user = "";
        if($id > 0){
            $user = User::find($id);
        }
        return view('personnel/add',compact('user'));
    }

    public function add_personnel(Request $request)
    {   
        $data = $request->except('_token');
        $data['store'] = session('store');
        $chk = User::where('account',$data['account'])->get();
        if(session('level') == 0){
            if(count($chk->all()) > 0){
                $json_arr['status'] = '400';
                $json_arr['msg'] = '账号已存在';
            }else{
                $res = User::firstOrCreate($data);
                if($res->wasRecentlyCreated){
                    // echo "新增成功";
                    $json_arr['status'] = '200';
                    $json_arr['msg'] = '新增成功';
                }else{
                    // echo "新增失败";
                    $json_arr['status'] = '400';
                    $json_arr['msg'] = '新增失败，请稍后再试，或联络管理员';
                }
            }
        }else{
            $json_arr['status'] = '400';
            $json_arr['msg'] = '权限不足，或联络管理员';
        }

        return $json_arr;
    }
    public function edit_personnel(Request $request)
    {   
        $data = $request->except('_token','id');
        $data['store'] = session('store');
        $chk = User::where('account',$data['account'])->get();
        if(session('level') == 0){
            if(count($chk->all()) > 0){
                $res = User::find($request->input('id'))->update($data);
                if($res){
                    // echo "新增成功";
                    $json_arr['status'] = '200';
                    $json_arr['msg'] = '更新成功';
                }else{
                    // echo "新增失败";
                    $json_arr['status'] = '400';
                    $json_arr['msg'] = '更新失败，请稍后再试，或联络管理员';
                }
            }else{
                $json_arr['status'] = '400';
                $json_arr['msg'] = '账号不存在';
            }
        }else{
            $json_arr['status'] = '400';
            $json_arr['msg'] = '权限不足，或联络管理员';
        }

        return $json_arr;
    }

    public function remove_personnel(Request $request)
    {
        $id = $request->id;
        if($id != ""){
            if(is_numeric($id) && ctype_digit($id)){
                $res = User::find($id)->delete();
                if($res){
                    $json_arr['status'] = '200';
                    $json_arr['msg'] = '删除成功';    
                }else{
                    $json_arr['status'] == '204';
                    $json_arr['msg'] = '资料库发生错误请稍后再试';        
                }
            }else{
                $json_arr['status'] = '204';
                $json_arr['msg'] = '资料形态错误';    
            }
        }else{
            $json_arr['status'] = '400';
            $json_arr['msg'] = '缺少资料';
        }
        return $json_arr;
    }

    public function customer_list()
    {   
        $users = Customer::where('store',session('store'))->get();
        // dd($users);
        return view('customer/list',compact('users'));
    }

    public function customer_add($id=0)
    {   
        $user = "";
        if($id > 0){
            $user = Customer::find($id);
        }
        return view('customer/add',compact('user'));
    }

    public function add_customer(Request $request)
    {   
        $data = $request->except('_token');
        $data['store'] = session('store');
        if(session('level') == 0){
            $res = Customer::firstOrCreate($data);
            if($res->wasRecentlyCreated){
                // echo "新增成功";
                $json_arr['status'] = '200';
                $json_arr['msg'] = '新增成功';
            }else{
                // echo "新增失败";
                $json_arr['status'] = '400';
                $json_arr['msg'] = '新增失败，请稍后再试，或联络管理员';
            }
        }else{
            $json_arr['status'] = '400';
            $json_arr['msg'] = '权限不足，或联络管理员';
        }

        return $json_arr;
    }
    public function edit_customer(Request $request)
    {   
        $data = $request->except('_token','id');
        $data['store'] = session('store');
        if(session('level') == 0){
            $res = Customer::find($request->input('id'))->update($data);
            if($res){
                // echo "新增成功";
                $json_arr['status'] = '200';
                $json_arr['msg'] = '更新成功';
            }else{
                // echo "新增失败";
                $json_arr['status'] = '400';
                $json_arr['msg'] = '更新失败，请稍后再试，或联络管理员';
            }
        }else{
            $json_arr['status'] = '400';
            $json_arr['msg'] = '权限不足，或联络管理员';
        }

        return $json_arr;
    }
    public function remove_customer(Request $request)
    {
        $id = $request->id;
        if($id != ""){
            if(is_numeric($id) && ctype_digit($id)){
                $res = Customer::find($id)->delete();
                if($res){
                    $json_arr['status'] = '200';
                    $json_arr['msg'] = '删除成功';    
                }else{
                    $json_arr['status'] == '204';
                    $json_arr['msg'] = '资料库发生错误请稍后再试';        
                }
            }else{
                $json_arr['status'] = '204';
                $json_arr['msg'] = '资料形态错误';    
            }
        }else{
            $json_arr['status'] = '400';
            $json_arr['msg'] = '缺少资料';
        }
        return $json_arr;
    }

    public function get_customer()
    {
        $customer = Customer::where('store',session('store'))->get();
        $customer_arr = array();
        foreach ($customer->all() as $key => $value) {
            $customer_str = $value->name."(".$value->id.")";
            array_push($customer_arr,$customer_str);
        }
        return $customer_arr;
    }

}
