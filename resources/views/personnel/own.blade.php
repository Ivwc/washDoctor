<div class="view view-main">
    <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
    <div class="pages navbar-through toolbar-through">
        <!-- Page, "data-page" contains page name -->
        <div data-page="own-edit" class="page">
          <!-- Top Navbar-->
          <div class="navbar">
              <div class="navbar-inner">
                  <div class="left">
                      <a href="#" class="link back" >
                          <i class="icon icon-back"></i>
                          <span>返回</span>
                      </a>
                  </div>
                  <div class="center">新增人员</div>
                  <div class="right">
                      {{--  <a href="#" class="open-panel" data-panel="right">功能选单</a>  --}}
                  </div>
              </div>
          </div> 
            <div class="page-content">
                <div class="content-block-title">所有栏位都是必填噢~</div>
                <div class="list-block">
                    <ul class="personnel-form">
                      {{csrf_field()}}
                      <input type="hidden" name="type" id="type" @if($user !="") value="edit" @else value="add" @endif>
                      <input type="hidden" name="personnelId" id="personnelId" @if($user !="") value="{{$user->id}}" @endif>
                      <li>
                        <div class="item-content">
                            <div class="item-inner avatar-area">
                                <input type="file" name="avatar" id="avatar" class="image-input" data-base64="">
                                <img @if($user->avatar != '') src="{{$user->avatar}}" @else src="{{url('resources/assets/images/addImage.png')}}" @endif alt="" class="user-avatar image-preview" id="user-avatar">
                            </div>
                        </div>
                      </li>  
                      <!-- Text inputs -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">账号</div>
                                    <div class="item-input">
                                    <input type="text" placeholder="输入账号" name="account" id="account" class="form-input" data-empty="账号" @if($user != "")value="{{$user->account}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">密码</div>
                                    <div class="item-input">
                                        <input type="text" placeholder="输入密码"  name="password" id="password" class="form-input" data-empty="密码" @if($user != "")value="{{$user->password}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                          <div class="item-content">
                              <div class="item-media"><i class="icon icon-form-name"></i></div>
                              <div class="item-inner">
                                  <div class="item-title label">姓名</div>
                                  <div class="item-input">
                                    <input type="text" placeholder="输入值称" name="name" id="name" class="form-input" data-empty="姓名" @if($user != "")value="{{$user->name}}"@endif>
                                  </div>
                              </div>
                          </div>
                      </li>
                        
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">职称</div>
                                    <div class="item-input">
                                      <input type="text" placeholder="输入值称" name="title" id="title" class="form-input" data-empty="职称" @if($user != "")value="{{$user->title}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                   
            </div>
            <!-- Bottom Toolbar-->
            <div class="toolbar">
                <div class="toolbar-inner">
                    <a href="#" class="link add-personnel-submit">送出</a>
                </div>
            </div>
        </div>
    </div>
</div>