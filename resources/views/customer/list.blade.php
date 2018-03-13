<div class="view view-main">
    <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
    <div class="pages navbar-through toolbar-through">
      <!-- Page, "data-page" contains page name -->
        <div data-page="customer-list" class="page">
            <!-- Top Navbar-->
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="left">
                        <a href="#" class="link back" >
                            <i class="icon icon-back"></i>
                            <span>返回</span>
                        </a>
                    </div>
                    <div class="center">顾客列表</div>
                    <div class="right">
                        <a href="customer/add">新增</a>
                    </div>
                </div>
            </div>  

            <div class="page-content">
                <div class="content-block-title">顾客名单</div>
                @if(count($users) > 0)
                <div class="list-block">
                    {{csrf_field()}}
                    <ul>
                        @foreach ($users as $k=>$v)
                        <li class="swipeout" data-id="{{$v->id}}">
                            <a href="customer/add/{{$v->id}}" class="swipeout-content item-content item-link">
                                <div class="item-inner">
                                    {{$v->name}}{{$v->title}}
                                </div>
                            </a>
                            <div class="swipeout-actions-right">
                                <a href="#" class="bg-red remove-customer-item">删除</a>
                            </div>
                        </li>  
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
                        尚未新增顾客
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