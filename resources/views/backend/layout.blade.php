<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WebcesiCMS | Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/backend/dist/css/skins/skin-blue.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/backend/dist/css/bootstrap-select.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/backend/dist/css/alertify/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="/backend/dist/css/alertify/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="/backend/dist/css/alertify/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="/backend/dist/css/alertify/bootstrap.min.css"/>

    <link rel="stylesheet" href="/backend/custom/css/custom.css">

    @yield('css')

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{route('frontend.index')}}" target="_blank" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>W</b>CM</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Webcesi</b>CMS</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!--<li class="dropdown messages-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>

                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">

                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>

                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>

                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>

                                </ul>

                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>-->
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    {{--<li class="dropdown notifications-menu">--}}
                        {{--<!-- Menu toggle button -->--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-bell-o"></i>--}}
                            {{--<span class="label label-warning">10</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 10 notifications</li>--}}
                            {{--<li>--}}
                                {{--<!-- Inner Menu: contains the notifications -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- start notification -->--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end notification -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">View all</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- Tasks Menu -->--}}
                    {{--<li class="dropdown tasks-menu">--}}
                        {{--<!-- Menu Toggle Button -->--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-flag-o"></i>--}}
                            {{--<span class="label label-danger">9</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 9 tasks</li>--}}
                            {{--<li>--}}
                                {{--<!-- Inner menu: contains the tasks -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<!-- Task title and progress text -->--}}
                                            {{--<h3>--}}
                                                {{--Design some buttons--}}
                                                {{--<small class="pull-right">20%</small>--}}
                                            {{--</h3>--}}
                                            {{--<!-- The progress bar -->--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<!-- Change the css width attribute to simulate progress -->--}}
                                                {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"--}}
                                                     {{--aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">20% Complete</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end task item -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer">--}}
                                {{--<a href="#">View all tasks</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/images/users/{{Auth::user()->user_file}}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/images/users/{{Auth::user()->user_file}}" class="img-circle" alt="{{Auth::user()->name}}">

                                <p>
                                    {{Auth::user()->name}}
                                    <small>Admin</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            {{--<li class="user-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Followers</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Sales</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 text-center">--}}
                                        {{--<a href="#">Friends</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('user.edit',Auth::user()->id)}}" class="btn btn-default btn-flat">Profil Düzenle</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('zeplin.logout')}}" class="btn btn-default btn-flat">Çıkış</a>
                                </div>

                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="{{route('zeplin.settings')}}" ><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/users/{{Auth::user()->user_file}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <!--<form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>-->
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Modüller</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="@yield('activeIndex')"><a href="{{route('zeplin.index')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li class="treeview @yield('activeHome') @yield('activeHomesetting')">
                    <a href="#"><i class="fa fa-home"></i><span>Anasayfa</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="@yield('activeHome')"><a href="{{route('home.index')}}"><i class="fa fa-th"></i> <span>Kutular</span></a>
                        <li class="@yield('activeHomesetting')"><a href="{{route('homesetting.index')}}"><i class="fa fa-cog"></i> <span>Genel Ayarlar</span></a>
                    </ul>
                </li>

                <li class="treeview @yield('activeSlider') @yield('activeSliderCreate')">
                    <a href="#"><i class="fa fa-picture-o"></i><span>Slider</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="@yield('activeSlider')"><a href="{{route('slider.index')}}"><i class="fa fa-list-ul"></i> <span>Sliderlar</span></a>
                        <li class="@yield('activeSliderCreate')"><a href="{{route('slider.create')}}"><i class="fa fa-plus-square"></i> <span>Ekle</span></a>
                    </ul>
                </li>

                <li class="treeview @yield('activePage') @yield('activePageCreate')">
                    <a href="#"><i class="fa fa-file-text-o"></i><span>Sayfalar</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="@yield('activePage')"><a href="{{route('page.index')}}"><i class="fa fa-list-ul"></i> <span>Sayfalar</span></a>
                        <li class="@yield('activePageCreate')"><a href="{{route('page.create')}}"><i class="fa fa-plus-square"></i> <span>Ekle</span></a>
                    </ul>
                </li>

                <li class="treeview @yield('activeBlog') @yield('activeBlogCreate') @yield('activeBlogoption') @yield('activeBlogcat') @yield('activeBlogcatCreate')">
                    <a href="#"><i class="fa fa-paper-plane"></i><span>Blog</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="@yield('activeBlog')"><a href="{{route('blog.index')}}"><i class="fa fa-list-ul"></i> <span>Bloglar</span></a>
                        <li class="@yield('activeBlogCreate')"><a href="{{route('blog.create')}}"><i class="fa fa-plus-square"></i> <span>Ekle</span></a>
                        <li class="@yield('activeBlogcat')"><a href="{{route('blogcat.index')}}"><i class="fa fa-list-ul"></i> <span>Kategoriler</span></a>
                        <li class="@yield('activeBlogcatCreate')"><a href="{{route('blogcat.create')}}"><i class="fa fa-plus-square"></i> <span>Kategori Ekle</span></a>
                        <li class="@yield('activeBlogoption')"><a href="{{route('blogoption.index')}}"><i class="fa fa-cog"></i> <span>Genel Ayarlar</span></a>
                    </ul>
                </li>

                <li class="treeview @yield('activeProduct') @yield('activeProductCreate') @yield('activeProductCategory') @yield('activeProductCategoryAdd') @yield('activeProductsoption')">
                    <a href="#"><i class="fa fa fa-tags"></i><span>Ürünler</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="@yield('activeProduct')"><a href="{{route('product.index')}}"><i class="fa fa-list-ul"></i> <span>Ürünler</span></a>
                        <li class="@yield('activeProductCreate')"><a href="{{route('product.create')}}"><i class="fa fa-plus-square"></i> <span>Ekle</span></a>

                        <li class="@yield('activeProductCategory')"><a href="{{route('productcategory.index')}}"><i class="fa fa-code-fork"></i> <span>Kategoriler</span></a>
                        <li class="@yield('activeProductCategoryAdd')"><a href="{{route('productcategory.create')}}"><i class="fa fa-plus-square"></i> <span>Kategori Ekle</span></a>

                        <li class="@yield('activeProductsoption')"><a href="{{route('productoption.index')}}"><i class="fa fa-cog"></i> <span>Genel Ayarlar</span></a>
                    </ul>
                </li>

                <li class="treeview @yield('activeNew') @yield('activeNewCreate') @yield('activeNewoption') @yield('activeNewsoption')">
                    <a href="#"><i class="fa fa-newspaper-o"></i><span>Haberler</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="@yield('activeNew')"><a href="{{route('new.index')}}"><i class="fa fa-list-ul"></i> <span>Haberler</span></a>
                        <li class="@yield('activeNewCreate')"><a href="{{route('new.create')}}"><i class="fa fa-plus-square"></i> <span>Ekle</span></a>
                        <li class="@yield('activeNewsoption')"><a href="{{route('newsoption.index')}}"><i class="fa fa-cog"></i> <span>Genel Ayarlar</span></a>
                    </ul>
                </li>

                <li class="treeview @yield('activeUser') @yield('activeSettings') @yield('activeFooter')">
                    <a href="#"><i class="fa fa-link"></i><span>Yönetim</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li class="@yield('activeUser')"><a href="{{route('user.index')}}"><i class="fa fa-users"></i> <span>Kullanıcılar</span></a>
                        <li class="@yield('activeFooter')"><a href="{{route('footer.index')}}"><i class="fa fa-bars"></i> <span>Footer</span></a>
                        <li class="@yield('activeSettings')"><a href="{{route('zeplin.settings')}}"><i class="fa fa-cogs"></i> <span>Ayarlar</span></a>
                    </ul>
                </li>

                <li class="@yield('activeContact')"><a href="{{route('contact.index')}}"><i class="fa fa-envelope"></i> <span>İletişim</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('pagetitle')
            </h1>
            @yield('breadcrumb')
        </section>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="box box-primary">

                    @yield('content')

            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            WebcesiCMS v.0.0.1
        </div>
        <!-- Default to the left -->
        <strong><a href="{{route('zeplin.index')}}">WebcesiCMS</a> &copy; 2021.</strong> Tüm hakları saklıdır.
    </footer>

    <!-- Control Sidebar -->
    {{--<aside class="control-sidebar control-sidebar-dark">--}}
        {{--<!-- Create the tabs -->--}}
        {{--<ul class="nav nav-tabs nav-justified control-sidebar-tabs">--}}
            {{--<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>--}}
            {{--<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>--}}
        {{--</ul>--}}
        {{--<!-- Tab panes -->--}}
        {{--<div class="tab-content">--}}
            {{--<!-- Home tab content -->--}}
            {{--<div class="tab-pane active" id="control-sidebar-home-tab">--}}
                {{--<h3 class="control-sidebar-heading">Recent Activity</h3>--}}
                {{--<ul class="control-sidebar-menu">--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;">--}}
                            {{--<i class="menu-icon fa fa-birthday-cake bg-red"></i>--}}

                            {{--<div class="menu-info">--}}
                                {{--<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>--}}

                                {{--<p>Will be 23 on April 24th</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.control-sidebar-menu -->--}}

                {{--<h3 class="control-sidebar-heading">Tasks Progress</h3>--}}
                {{--<ul class="control-sidebar-menu">--}}
                    {{--<li>--}}
                        {{--<a href="javascript:;">--}}
                            {{--<h4 class="control-sidebar-subheading">--}}
                                {{--Custom Template Design--}}
                                {{--<span class="pull-right-container">--}}
                    {{--<span class="label label-danger pull-right">70%</span>--}}
                  {{--</span>--}}
                            {{--</h4>--}}

                            {{--<div class="progress progress-xxs">--}}
                                {{--<div class="progress-bar progress-bar-danger" style="width: 70%"></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.control-sidebar-menu -->--}}

            {{--</div>--}}
            {{--<!-- /.tab-pane -->--}}
            {{--<!-- Stats tab content -->--}}
            {{--<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>--}}
            {{--<!-- /.tab-pane -->--}}
            {{--<!-- Settings tab content -->--}}
            {{--<div class="tab-pane" id="control-sidebar-settings-tab">--}}
                {{--<form method="post">--}}
                    {{--<h3 class="control-sidebar-heading">General Settings</h3>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="control-sidebar-subheading">--}}
                            {{--Report panel usage--}}
                            {{--<input type="checkbox" class="pull-right" checked>--}}
                        {{--</label>--}}

                        {{--<p>--}}
                            {{--Some information about this general settings option--}}
                        {{--</p>--}}
                    {{--</div>--}}
                    {{--<!-- /.form-group -->--}}
                {{--</form>--}}
            {{--</div>--}}
            {{--<!-- /.tab-pane -->--}}
        {{--</div>--}}
    {{--</aside>--}}
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>

<!-- JavaScript -->
<script src="/backend/dist/js/alertify.min.js"></script>


<!-- Latest compiled and minified JavaScript -->
<script src="/backend/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-tr.min.js"></script>-->

@yield('js')

@if(session()->has('success'))<script>alertify.success('{{session('success')}}');</script>@endif
@if(session()->has('error'))<script>alertify.error('{{session('error')}}');</script>@endif

<script>
    $('.selectpicker').selectpicker();
</script>

<script>
    @foreach($errors->all() as $error)
        alertify.error('{{$error}}')
    @endforeach
</script>

</body>
</html>