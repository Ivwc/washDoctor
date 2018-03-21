<div class="view view-main">
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
            <div data-page="todo-detail" class="page">
                <!-- Top Navbar-->
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="left">
                            <a href="#" class="link back" >
                                <i class="icon icon-back"></i>
                                <span>返回</span>
                            </a>
                        </div>
                        <div class="center">待办详细</div>
                        <div class="right">
                        </div>
                    </div>
                </div>  

                <div class="page-content">
                    @if(count($data) > 0)
                    <div class="list-block">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-content-inner">
                                    <p>创建: {{$data->creater->name}}</p>
                                    <p>内容: {{$data->content}}</p>
                                    <p>顾客: {{$data->customer->name}}</p>
                                    @if($data->customer->phone != "")
                                    <p>顾客电话: {{$data->customer->phone}}</p>
                                    @endif
                                    @if($data->customer->mobile != "")
                                    <p>顾客手机: {{$data->customer->mobile}}</p>
                                    @endif
                                    <div>
                                        @if(count($data->notice) > 0)
                                          注意事项
                                        @endif
                                        @foreach ($data->notice as $k2=>$v2)
                                            <div><input type="checkbox" data-id="{{$v2->id}}" name="todoItem-{{$k2}}" id="todoItem-{{$k2}}" class="todo-item" @if($v2->taker != "" || $v2->taker != NULL)checked=""@endif><label for="todoItem-{{$k2}}">{{$v2->content}}</label><span class="taker-name"> @if($v2->taker != "" || $v2->taker != NULL)({{$v2->name}})@endif</span></div>
                                        @endforeach
                                    </div>
                                    <p>顾客位置</p>
                                    
                                    <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDYhkt91xCw1OFFbItcESuazfYrwZ8r85I&q={{$data->customer->addr}}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="card-footer" data-id="{{$data->id}}">
                                <a class="done_todo">处里完成</a>
                                @if($data->creater->id == session('id'))
                                <a href="todo/add/{{$data->id}}">编辑</a>
                                <a class="remove_todo">删除</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="empty-page">
                        <div>
                            无此待办
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <!-- Bottom Toolbar-->
        <div class="toolbar">
          <div class="toolbar-inner">
            <a href="#" class="link done_todo" data-id="">完成</a>
          </div>
        </div>
      </div>