<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Online Shop - Lazday</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/fonts/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/fonts/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{asset('public/dist/css/skins/_all-skins.min.css')}}">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

@yield('customcss')
</head>
<body class="hold-transition skin-purple sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>OLS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Online<b>Shop</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">


            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->name }}

                    <small>Bergabung Sejak, 
                      @if(Auth::user()->created_at != null)
                      {{ Auth::user()->created_at->format('m') }}-{{ Auth::user()->created_at->format('Y') }},
                      @else
                      -
                      @endif


                      </small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">               
                  <div class="pull-right">    


                    <a class="btn btn-danger btn-sm btn-flat" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span class="fa fa-sign-out"></span> Sign out</a>
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
        <!--   Control Sidebar Toggle Button
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    
    
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
     <!--    <li class="header">MAIN NAVIGATION</li> -->
     <li class="treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span>Master</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href=" {{route('users')}} "><i class="fa fa-users"></i> User</a></li>
      </ul> 
      <ul class="treeview-menu">
        <li><a href="{{route('products.index')}} "><i class="fa fa-dropbox"></i> Produk</a></li>
      </ul>
    </li>



  </ul>
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 @include('template.contentheader') 
 <!-- Main content -->
 <section class="content">

   @yield('content')

 </section>
 <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b><a href="http://www.fb.com/softsed">2018</a></b> 
  </div>
  <strong> <a href="http://almsaeedstudio.com">M. Taufik Hidayat</a></strong> 
</footer>


 

    </div>
 
  </div>
</aside>
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 2.2.3 -->
 <script src="{{asset('public/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
 <!-- SlimScroll -->
 <script src="{{asset('public/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
 <!-- FastClick -->
 <script src="{{asset('public/plugins/fastclick/fastclick.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{asset('public/dist/js/app.min.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{asset('public/dist/js/demo.js')}}"></script>

 @yield('customscript')
</body>
</html>
