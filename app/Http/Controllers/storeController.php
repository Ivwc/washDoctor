<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;

class storeController extends Controller
{
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
            dd($user);
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

}
