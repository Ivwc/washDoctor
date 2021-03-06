<div class="view view-main">
    <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
    <div class="pages navbar-through toolbar-through">
        <!-- Page, "data-page" contains page name -->
        <div data-page="customer-add" class="page">
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
                    <ul class="customer-form">
                      {{csrf_field()}}
                      <input type="hidden" name="type" id="type" @if($user !="") value="edit" @else value="add" @endif>
                      <input type="hidden" name="customerId" id="customerId" @if($user !="") value="{{$user->id}}" @endif>
                        <!-- Text inputs -->
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">顾客名称</div>
                                    <div class="item-input">
                                    <input type="text" placeholder="输入顾客名称" name="name" id="name" class="form-input" data-empty="顾客名称" @if($user != "")value="{{$user->name}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">电话</div>
                                    <div class="item-input">
                                        <input type="number" placeholder="输入电话"  name="phone" id="phone" class="form-input" data-empty="电话或手机" data-other-chk="mobile" @if($user != "")value="{{$user->phone}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                          <div class="item-content">
                              <div class="item-media"><i class="icon icon-form-name"></i></div>
                              <div class="item-inner">
                                  <div class="item-title label">手机</div>
                                  <div class="item-input">
                                    <input type="text" placeholder="输入手机" name="mobile" id="mobile" class="form-input" data-empty="电话或手机" data-other-chk="phone" @if($user != "")value="{{$user->mobile}}"@endif>
                                  </div>
                              </div>
                          </div>
                      </li>
                        
                        <li>
                            <div class="item-content">
                                <div class="item-media"><i class="icon icon-form-name"></i></div>
                                <div class="item-inner">
                                    <div class="item-title label">地址</div>
                                    <div class="item-input">
                                      <input type="text" placeholder="输入值称" name="addr" id="addr" class="form-input" data-empty="地址" @if($user != "")value="{{$user->addr}}"@endif>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="align-top">
                          <div class="item-content">
                            <div class="item-media"><i class="icon icon-form-comment"></i></div>
                            <div class="item-inner">
                              <div class="item-title label">注意事项(选填)</div>
                              <div class="item-input">
                                <textarea placeholder="ex:先打电话约时间..." name="notice" id="notice">@if($user != ""){{$user->notice}}@endif</textarea>
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
                    <a href="#" class="link add-customer-submit">送出</a>
                </div>
            </div>
        </div>
    </div>
</div>