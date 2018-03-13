<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class todoController extends Controller
{
    //
    public function todo_list()
    {
        
        return view('todo/list');
    }

    public function todo_add()
    {
        $user = "";
        return view('todo/add',compact('user'));
    }
}
