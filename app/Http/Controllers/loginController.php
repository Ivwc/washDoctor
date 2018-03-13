<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class loginController extends Controller
{   
    public function login()
    {   
        if(!session('account')){
            return view('login');
        }else{
            return redirect('/');
        }
    }
    public function dologin(Request $request)
    {   
        
        $account = $request->account;
        $password = $request->password;
        
        if(!empty($account)){
            if(!empty($password)){
                $user = User::where('account',$account)->where('password',$password)->first();
                if($user == null){
                    $json_arr = array(
                        'status'=>'202',
                        'msg'=>'此账号未存在或密码不符'
                    );    
                }else{
                    session(['account'=>$user->account,'id'=>$user->id,'title'=>$user->title,'name'=>$user->name,'level'=>$user->level,'store'=>$user->store]);
                    $json_arr = array(
                        'status'=>'200',
                        'msg'=>'登入成功'
                    );
                }
            }else{
                $json_arr = array(
                    'status'=>'400',
                    'msg'=>'密码未填写'
                );
            }
        }else{
            $json_arr = array(
                'status'=>'400',
                'msg'=>'账号未填写'
            );
        }
        echo json_encode($json_arr);
    }

    public function logout()
    {
        if(session('account')){
            session(['account'=>null,'id'=>null,'title'=>null,'name'=>null,'level'=>null,'store'=>null]);
            return redirect('login');
        }
    }
}
