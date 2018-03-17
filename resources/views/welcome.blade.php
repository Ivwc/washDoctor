@extends('layout')
@section('content')
      <div class="view view-main">
        <!-- Top Navbar-->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="left">
                  <a href="#" class="open-panel" data-panel="left">基本资料</a>
                </div>
                <div class="center">衣博士</div>
                <div class="right">
                    <a href="#" class="open-panel" data-panel="right">功能选单</a>
                </div>
            </div>
          </div> 
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
          <div data-page="index" class="page">
            <div class="page-content">
              <p>今天待办</p>
              @foreach ($todo as $k=>$v)
              <div class="card">
                  <div class="card-header">{{$v->start_at}}</div>
                  <div class="card-content">
                    <div class="card-content-inner">
                        <p>顾客: {{$v->customer->name}}</p>
                        <p>内容: {{$v->content}}</p>
                        <div>
                          @if(count($v->notice) > 0)
                          注意事项
                          @endif
                          @foreach ($v->notice as $k2=>$v2)
                            <div><input type="checkbox" data-id="{{$v2->id}}" name="todoItem-{{$k."-".$k2}}" id="todoItem-{{$k."-".$k2}}" class="todo-item" @if($v2->taker != "" || $v2->taker != NULL)checked=""@endif><label for="todoItem-{{$k."-".$k2}}">{{$v2->content}}</label><span class="taker-name"> @if($v2->taker != "" || $v2->taker != NULL)({{$v2->name}})@endif</span></div>
                          @endforeach
                        </div>
                    </div>
                  </div>
                <div class="card-footer" data-id="{{$v->id}}">
                  <a class="done_todo">处里完成</a>
                  @if($v->creater == session('id'))
                  <a href="todo/add/{{$v->id}}">编辑</a>
                  <a class="remove_todo">删除</a>
                  @endif
                  <a href="">详细</a>
                </div>
              </div>
              @endforeach
            </div>

            <!-- Bottom Toolbar-->
            <div class="toolbar">
              <div class="toolbar-inner">
                <!-- Toolbar links -->
                <a href="#" class="link">index</a>
                <a href="#" class="link">Link</a>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection