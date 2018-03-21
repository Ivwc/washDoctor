<div class="view view-main">
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
            <div data-page="todo-list" class="page">
                <!-- Top Navbar-->
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="left">
                            <a href="#" class="link back" >
                                <i class="icon icon-back"></i>
                                <span>返回</span>
                            </a>
                        </div>
                        <div class="center">待办列表</div>
                        <div class="right">
                            <a href="todo/add">新增</a>
                        </div>
                    </div>
                </div>  

                <div class="page-content">
                    <div class="content-block-title">待办列表</div>
                    @if(count($todo) > 0)
                    @foreach ($todo as $k=>$v)
                      <div class="card">
                        <div class="card-header">{{$v->start_at}}</div>
                        <div class="card-content">
                          <div class="card-content-inner">
                              <p>创建: {{$v->creater->name}}</p>
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
                            @if($v->status == '0')    
                            <a class="done_todo">处里完成</a>
                            @endif
                            @if($v->creater->id == session('id'))
                            <a href="todo/add/{{$v->id}}">编辑</a>
                            <a class="remove_todo">删除</a>
                            @endif
                            <a href="todo/detail/{{$v->id}}">详细</a>
                        </div>
                      </div>
                    @endforeach
                    @else
                    <div class="empty-page">
                        <div>
                            尚未新增人员
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <!-- Bottom Toolbar-->
        {{--  <div class="toolbar">
          <div class="toolbar-inner">
            <a href="#" class="link">Link 1</a>
            <a href="#" class="link">Link 2</a>
          </div>
        </div>  --}}
      </div>