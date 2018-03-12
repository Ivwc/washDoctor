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
              首页{{session('account')}}
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