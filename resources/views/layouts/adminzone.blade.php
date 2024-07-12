<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kinto</title>
  <link rel="shortcut icon" href="/images/favicon.png" type="">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Main</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    @if(Auth::check())
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{ Auth::user()->name }}
        </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
  <span class="dropdown-item dropdown-header">
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </a>
    </form>
  </span>
  <div class="dropdown-divider"></div>
</li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a> -->
      </li>

    </ul>
    @endif
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="/images/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if(Auth::check())
        <div class="image">
          <img src="/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
        @endif
      </div>


      <!-- Sidebar Menu -->
      @if(Auth::check())
      <nav class="mt-2">


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="{{ route('orders') }}" class="nav-link">
             <i class="nav-icon far fa-circle text-info"></i>
             <p><i class="fas fa-edit"></i> Замовлення</p>
           </a>
         </li>
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Категорії</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Товари</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('team.index') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Клієнти</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Користувачі</p>
            </a>
          </li>
        <li class="nav-item">
          <a href="{{ route('slider') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p>Наповнення</p>
          </a>
        </li>
          <li class="nav-item">
            <a href="{{ route('show_content', ['slag' => 'logo']) }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p class="text">Логотип </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('slider') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Слайдер</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                <i class="fas fa-edit"></i> Слайдер
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('show_content', ['slag' => 'main_foto']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><i class="fas fa-edit"></i> Зображення</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_content', ['slag' => 'header_1']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><i class="fas fa-edit"></i> Перший текст</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_content', ['slag' => 'header_2']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><i class="fas fa-edit"></i> Другий текст</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_content', ['slag' => 'header_3']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><i class="fas fa-edit"></i> Третій текст</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('show_content', ['slag' => 'button']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><i class="fas fa-edit"></i> Кнопка</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Про нас</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('show_content', ['slag' => 'coordinate']) }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p><i class="fas fa-edit"></i> Карта</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('show_content', ['slag' => 'galery']) }}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p><i class="fas fa-edit"></i> Галерея</p>
            </a>
          </li>
        </ul>
      </nav>
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; </strong>

    <div class="float-right d-none d-sm-inline-block">
      <b>Kinto</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/plugins/raphael/raphael.min.js"></script>
<script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->

</body>
</html>
