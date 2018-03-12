@extends('layout')
@section('content')
      <!-- Your main view, should have "view-main" class -->
      <div class="view view-main">
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
          <div data-page="index" class="page">
            <!-- Top Navbar-->
            <div class="navbar">
              <div class="navbar-inner">
                <!-- We need cool sliding animation on title element, so we have additional "sliding" class -->
                <div class="center sliding">Awesome App</div>
              </div>
            </div>

            <!-- Scrollable page content -->
            <div class="page-content">
              <p>第一页</p>
              <!-- Link to another page -->
              <a href="/myDefault_withframework7/resources/views/about.blade.php">About app</a>
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