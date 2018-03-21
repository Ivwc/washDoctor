<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Your app title -->
    <title>My App</title>
    <!-- Path to Framework7 Library CSS, iOS Theme -->
    <link rel="stylesheet" href="{{url('resources/assets/framework7/css/framework7.ios.min.css')}}">
    <!-- Path to Framework7 color related styles, iOS Theme -->
    <link rel="stylesheet" href="{{url('resources/assets/framework7/css/framework7.ios.colors.min.css')}}">
    <!-- Path to your custom app styles-->
    <link rel="stylesheet" href="{{url('resources/assets/framework7/css/my-app.css')}}">
    <script type="text/javascript" src="resources/assets/fontawesome/js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="resources/assets/js/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <!-- Status bar overlay for full screen mode (PhoneGap) -->
    <div class="statusbar-overlay"></div>
    <!-- Views -->
    <div class="views">
        <div class="panel-overlay"></div>
        <!-- Left Panel with Reveal effect -->
        <div class="panel panel-left panel-cover">
            <div class="content-block">
            <div class="avatar" @if(session('avatar') !== null)style="background-image:url({{url('resources/assets/user')}}/user-{{session('id')}}.png)" @endif>
                  
                </div>
                <p>账号: @if(session('account')){{{session('account')}}} @endif</p>
                <p>所属: @if(session('store') !== null)
                    @switch(session('store'))
                        @case(0)
                            东兴店
                            @break
                        @case(1)
                            
                            @break    
                    @endswitch
                 @endif
                </p>
                <p>姓名: @if(session('name')){{{session('name')}}} @endif</p>
                <p>职称: @if(session('title')){{{session('title')}}} @endif</p>
                <form action="/washDoctor/logout" method="POST">
                    {{csrf_field()}}
                    <input type="submit" value="登出" class="button close-panel">
                </form>
                <br>
                <a class="button close-panel" href="personnel/own/{{session('id')}}">编辑</a>
                
            </div>
        </div>
           
        <!-- Right Panel with Cover effect -->
        <div class="panel panel-right panel-cover">
            @if(session('level') == 0)
            <div class="content-block-title">店长功能</div>
            <div class="list-block">
                <ul>
                    <li>
                        <a href="personnel/list" class="item-link item-content close-panel">
                          <div class="item-media"><i class="fas fa-address-card"></i></div>
                          <div class="item-inner">
                            <div class="item-title">人员列表</div>
                          </div>
                        </a>
                    </li>
                    <li>
                        <a href="customer/list" class="item-link item-content close-panel">
                          <div class="item-media"><i class="fas fa-address-card"></i></div>
                          <div class="item-inner">
                            <div class="item-title">顾客列表</div>
                          </div>
                        </a>
                    </li>
                </ul>
                {{--  <div class="list-block-label">List block label text goes here</div>  --}}
            </div>
            @endif
            <div class="content-block-title">一般功能</div>
            <div class="list-block">
                <ul>
                    <li>
                        <a href="todo/add" class="item-link item-content close-panel">
                          <div class="item-media"><i class="fas fa-address-card"></i></div>
                          <div class="item-inner">
                            <div class="item-title">新增待办</div>
                          </div>
                        </a>
                    </li>
                    <li>
                        <a href="todo/list" class="item-link item-content close-panel">
                          <div class="item-media"><i class="fas fa-address-card"></i></div>
                          <div class="item-inner">
                            <div class="item-title">待办列表</div>
                          </div>
                        </a>
                    </li>
                </ul>
                <div class="list-block-label"></div>
            </div>
        </div>
        <!-- Your main view, should have "view-main" class -->
        @yield('content')
    </div>
    <script type="text/javascript" src="{{url('resources/assets/js/jquery-3.2.1.min.js')}}"></script>
    <!-- Path to Framework7 Library JS-->
    <script type="text/javascript" src="{{url('resources/assets/framework7/js/framework7.min.js')}}"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="{{url('resources/assets/framework7/js/my-function.js')}}"></script>
    <script type="text/javascript" src="{{url('resources/assets/framework7/js/my-app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <script>
    
  </script>
</html> 