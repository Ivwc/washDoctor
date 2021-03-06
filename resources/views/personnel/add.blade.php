<div class="view view-main">
    <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
    <div class="pages navbar-through toolbar-through">
        <!-- Page, "data-page" contains page name -->
        <div data-page="personnel-add" class="page">
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
                                <img @if(isset($user->avatar)) src="{{$user->avatar}}" @else src="{{url('resources/assets/images/addImage.png')}}" @endif alt="" class="user-avatar image-preview" id="user-avatar">
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

                        <li>
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-gender"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">权限</div>
                              <div class="item-input">
                                <select name="level" id="level" class="form-input" data-empty="权限">
                                  <option value="">--选择权限--</option>
                                  <option value="1" @if($user != "" && $user->level == '1')selected=""@endif>正职权限</option>
                                  <option value="2" @if($user != "" && $user->level == '2')selected=""@endif>工读权限</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </li>


                        {{--  <li>
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-email"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">E-mail</div>
                              <div class="item-input">
                                <input type="email" placeholder="E-mail">
                              </div>
                            </div>
                          </div>
                        </li>
                        ...
                        <!-- Select -->
                        <li>
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-gender"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">Gender</div>
                              <div class="item-input">
                                <select>
                                  <option>Male</option>
                                  <option>Female</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </li>
                        <!-- Date -->
                        <li>
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">Birth date</div>
                              <div class="item-input">
                                <input type="date" placeholder="Birth day" value="2014-04-30">
                              </div>
                            </div>
                          </div>
                        </li>
                        <!-- Date time-->
                        <li>
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-calendar"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">Date time</div>
                              <div class="item-input">
                                <input type="datetime-local">
                              </div>
                            </div>
                          </div>
                        </li>
                        <!-- Switch (Checkbox) -->
                        <li>
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-toggle"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">Switch</div>
                              <div class="item-input">
                                <label class="label-switch">
                                  <input type="checkbox">
                                  <div class="checkbox"></div>
                                </label>
                              </div>
                            </div>
                          </div>
                        </li>
                        <!-- Slider (Range input) -->
                        <li>
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-settings"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">Slider</div>
                              <div class="item-input">
                                <div class="range-slider">
                                  <input type="range" min="0" max="100" value="50" step="0.1">
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <!-- Textarea -->
                        <li class="align-top">
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-comment"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">Textarea</div>
                              <div class="item-input">
                                <textarea></textarea>
                              </div>
                            </div>
                          </div>
                        </li>  --}}
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