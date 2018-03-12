<div class="view view-main">
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
            <div data-page="personnel-list" class="page">
                <!-- Top Navbar-->
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="left">
                            <a href="#" class="link back" >
                                <i class="icon icon-back"></i>
                                <span>返回</span>
                            </a>
                        </div>
                        <div class="center">人员列表</div>
                        <div class="right">
                            <a href="personnel/add">新增</a>
                        </div>
                    </div>
                </div>  

                <div class="page-content">
                    <div class="content-block-title">人员名单</div>
                    <div class="list-block">
                        <ul>
                            @if(count($users) > 0)
                                @foreach ($users as $k=>$v)
                                <a href="personnel/add/{{$v->id}}" class="item-link">
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title">
                                                {{$v->name}}{{$v->title}}
                                            </div>
                                        </div>
                                    </div>
                                </a>       
                            @endforeach
                            {{--  <li class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Item with badge</div>
                                </div>
                            </li>  --}}
                        </ul>
                    </div>
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