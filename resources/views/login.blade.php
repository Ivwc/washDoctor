@extends('layout')
@section('content')
      <div class="view view-main login">
        <!-- Top Navbar-->
        <div class="navbar">
          <div class="navbar-inner">
            <!-- We need cool sliding animation on title element, so we have additional "sliding" class -->
            <div class="center sliding">登入画面</div>
          </div>
        </div>
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
          <div data-page="login" class="page">
            <!-- Scrollable page content -->
            <div class="page-content">
                <div class="container">
                    <div class="login-area">
                        <img class="logo" src="resources/assets/images/1770172-0-1480340634.jpg" alt="">
                        <div>
                            <i class="far fa-user-circle"></i>
                            <input type="text" name="account" id="account" class="account">
                        </div>
                        <div>
                            <i class="fas fa-unlock-alt"></i>
                            <input type="password" name="password" id="password" class="password">
                        </div>
                        
                        <div class="button-area login-btn">
                            <?php echo csrf_field()?>
                            <a>登入</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection