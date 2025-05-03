<!DOCTYPE html>
<html lang="KH">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {{-- <title>Datatables - Kaiadmin Bootstrap 5 Admin Dashboard</title> --}}

    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="icon" href="{{ asset('backends/assets/img/logo/hitech-icon.png') }}" type="image/x-icon" />
    <script src="{{ asset('backends/assets/js/plugin/webfont/webfont.min.js') }}"></script>


    <!-- Fonts and icons -->
    <script src="{{ asset('backends/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["../assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backends/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/css/fonts.min.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backends/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/ui-css/semantic.css') }}" />
    <link rel="stylesheet" href="{{ asset('backends/assets/js/sweetalert/sweetalert2.min.css') }}">

    {{-- text editor  --}}
    {{-- <link rel="stylesheet" href="{{ asset('backends/assets/css/ckeditor/ckeditor5.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('backends/assets/text-editor/summernote.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backends/assets/text-editor/summernote-lite.min.css')}}">

    @yield('title')
    <link rel="stylesheet" href="{{ asset('backends/assets/css/my-css/my-css.css')}}" />

    @yield('css')

  </head>
  <body class="body">

    <div id="preloader" class="preloader d-none">
        <div class="spinner"></div>
    </div>
{{-- 
    <div id="window-preload" class="preloader d-none window-preload">
        <div class="spinner"></div>
    </div> --}}


    <div class="wrapper">
        <!-- Sidebar -->
            <div class="sidebar" data-background-color="dark">
                <div class="sidebar-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                    <a href="{{ route('/') }}" class="logo">
                        @php
                            $logo = DB::table('company_informations')->select('logo')->get()->first();
                        @endphp
                        @if ($logo->logo != '')
                        <img src="{{ asset($logo->logo) }}" alt="logo" class="navbar-brand" height="42">
                        @else
                        <img src="{{ asset('backends/assets/img/logo/SL Hi-Tech Logo-01.png') }}" alt="logo" class="navbar-brand" height="42" />

                        @endif


                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item" id="home">
                            <a  href="{{ route('/') }}" class="collapsed">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>{{ __('Dashboard') }}</p>
                            </a>
                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Manage pages</h4>
                        </li>
                        
                        <li class="nav-item" id="homepage">
                            <a data-bs-toggle="collapse" href="#homepagecollapse">
                                <i class="fas fa-home"></i>
                                <p>{{__('Home page')}}</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="homepagecollapse">
                                <ul class="nav nav-collapse">
                                    <li class="slide">
                                        <a href="{{ route('home.slide') }}">
                                            <span class="sub-item">{{__('Slide show')}}</span>
                                        </a>
                                    </li>
                                    <li class="award">
                                        <a href="{{ route('home.award') }}">
                                            <span class="sub-item">{{__('Award')}}</span>
                                        </a>
                                    </li>
                                    <li class="society">
                                        <a href="{{ route('home.society') }}">
                                            <span class="sub-item">{{__('Society')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item" id="ourwater">
                            <a  href="{{ route('our-water') }}" class="collapsed">
                                <i class="fas fa-tint"></i>
                                <p>{{ __(' Our water ') }}</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item" id="event">
                            <a  href="{{ route('event.index') }}" class="collapsed">
                                <i class="fab fa-slack"></i>
                                <p>{{ __(' Event ') }}</p>
                            </a>
                        </li> --}}
                        <li class="nav-item" id="blog">
                            <a  href="{{ route('blog.index') }}" class="collapsed">
                                <i class="fab fa-blogger-b"></i>
                                <p>{{ __(' Blogs ') }}</p>
                            </a>
                        </li>

                        <li class="nav-item" id="about">
                            <a data-bs-toggle="collapse" href="#aboutpage">
                                <i class="fas fa-info-circle"></i>
                                <p>{{__('About page')}}</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="aboutpage">
                                <ul class="nav nav-collapse">
                                    <li class="overview">
                                        <a  href="{{ route('about.index') }}">
                                            <span class="sub-item">{{ __('Overview') }}</span>
                                        </a>
                                    </li>
                                    <li class="company">
                                        <a href="{{ route('about.company') }}">
                                            <span class="sub-item">{{__('About us')}}</span>
                                        </a>
                                    </li>

                                    {{-- <li>
                                        <a href="">
                                            <span class="sub-item">{{__('Execute manager')}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="sub-item">{{__('Our vision')}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="sub-item">{{__('Core valules')}}</span>
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="">
                                            <span class="sub-item">{{__('Accerditation')}}</span>
                                        </a>
                                    </li>--}}
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item" id="contact">
                            <a  href="{{ route('contact.index') }}" class="collapsed">
                                <i class="fab fa-blogger-b"></i>
                                <p>{{ __(' Contacts ') }}</p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a  href="{{ route('about.index') }}" class="collapsed">
                                <i class="fas fa-info-circle"></i>
                                <p>{{ __('About us') }}</p>
                            </a>
                        </li> --}}
                       
                        {{-- <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Components</h4>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Base</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                <li>
                                    <a href="components/avatars.html">
                                    <span class="sub-item">Avatars</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/buttons.html">
                                    <span class="sub-item">Buttons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/gridsystem.html">
                                    <span class="sub-item">Grid System</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/panels.html">
                                    <span class="sub-item">Panels</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/notifications.html">
                                    <span class="sub-item">Notifications</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/sweetalert.html">
                                    <span class="sub-item">Sweet Alert</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/font-awesome-icons.html">
                                    <span class="sub-item">Font Awesome Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/simple-line-icons.html">
                                    <span class="sub-item">Simple Line Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="components/typography.html">
                                    <span class="sub-item">Typography</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </li> --}}

                        <li class="nav-item" id="settings">
                            <a data-bs-toggle="collapse" href="#settingcollapse">
                                <i class="fas fa-cogs"></i>
                                <p> {{ __('Settings') }} </p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="settingcollapse">
                                <ul class="nav nav-collapse">
                                    <li class="companyinfo">
                                        <a href="{{ route('company.index') }}">
                                        <span class="sub-item"> {{ __('Company Information') }} </span>
                                        </a>
                                    </li>
                                    <li class="socialmedia">
                                        <a href="{{ route('company.social') }}">
                                        <span class="sub-item"> {{ __('Social media') }} </span>
                                        </a>
                                    </li>
                                    <li class="themsetting">
                                        <a href="{{ route('theme.index') }}">
                                        <span class="sub-item"> {{ __('Theme setting') }} </span>
                                        </a>
                                    </li>
                                
                                </ul>
                            </div>
                        </li>

                        @if (@Auth::user()->role == 'superadmin')
                        
                        <li class="nav-item" id="users">
                            <a  href="{{ route('user.index') }}" class="collapsed">
                                <i class="fas fa-users-cog"></i>
                                <p>{{ __(' Manage users ') }}</p>
                            </a>
                        </li>

                        @endif


                        {{-- <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#userPermission">
                                <i class="fas fa-users-cog"></i>
                                <p> {{ __('Manage users') }} </p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="userPermission">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('user.index') }}">
                                        <span class="sub-item"> {{ __('Users') }} </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/permissions') }}">
                                        <span class="sub-item"> {{ __('Permissions') }} </span>
                                        </a>
                                    </li>
                                
                                </ul>
                            </div>
                        </li> --}}


                        {{-- <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#forms">
                                <i class="fas fa-pen-square"></i>
                                <p>Forms</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="forms">
                                <ul class="nav nav-collapse">
                                <li>
                                    <a href="forms/forms.html">
                                    <span class="sub-item">Basic Form</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#tables">
                                <i class="fas fa-table"></i>
                                <p>Tables</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="tables">
                                <ul class="nav nav-collapse">
                                <li>
                                    <a href="tables/tables.html">
                                    <span class="sub-item">Basic Table</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tables/datatables.html">
                                    <span class="sub-item">Datatables</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#maps">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Maps</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="maps">
                                <ul class="nav nav-collapse">
                                <li>
                                    <a href="maps/googlemaps.html">
                                    <span class="sub-item">Google Maps</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="maps/jsvectormap.html">
                                    <span class="sub-item">Jsvectormap</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#charts">
                                <i class="far fa-chart-bar"></i>
                                <p>Charts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="charts">
                                <ul class="nav nav-collapse">
                                <li>
                                    <a href="charts/charts.html">
                                    <span class="sub-item">Chart Js</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="charts/sparkline.html">
                                    <span class="sub-item">Sparkline</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Widgets</p>
                                <span class="badge badge-success">4</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="../../documentation/index.html">
                                <i class="fas fa-file"></i>
                                <p>Documentation</p>
                                <span class="badge badge-secondary">1</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#submenu">
                                <i class="fas fa-bars"></i>
                                <p>Menu Levels</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="submenu">
                                <ul class="nav nav-collapse">
                                <li>
                                    <a data-bs-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                        <a href="#">
                                            <span class="sub-item">Level 2</span>
                                        </a>
                                        </li>
                                        <li>
                                        <a href="#">
                                            <span class="sub-item">Level 2</span>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-bs-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                        <a href="#">
                                            <span class="sub-item">Level 2</span>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="sub-item">Level 1</span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                    </div>
                </div>
            </div>
        <!-- End Sidebar -->
    

        
            <div class="main-panel">
                {{-- main content  --}}
                    <div class="main-header">
                        <div class="main-header-logo">
                        <!-- Logo Header -->
                        <div class="logo-header" data-background-color="dark">
                            <a href="{{ route('/') }}" class="logo">
                                @php
                                    $logo = DB::table('company_informations')->select('logo')->get()->first();
                                @endphp
                                @if ($logo->logo != '')
                                    <img src="{{ asset($logo->logo) }}" alt="logo" class="navbar-brand" height="42">
                                @else
                                    <img src="{{ asset('backends/assets/img/logo/SL Hi-Tech Logo-01.png') }}" alt="logo" class="navbar-brand" height="42" />
                                @endif
                            {{-- <img src="{{ asset('backends/assets/img/logo/SL Hi-Tech Logo-01.png') }}" alt="navbar brand" class="navbar-brand" height="42" /> --}}
                            </a>
                            <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                            </div>
                            <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                            </button>
                        </div>
                        <!-- End Logo Header -->
                        </div>
                        <!-- Navbar Header -->
                        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                        <div class="container-fluid">
                            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                                {{-- <div class="input-group">
                                    <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                    </div>
                                    <input type="text" placeholder="Search ..." class="form-control" />
                                </div> --}}
                                <h2 class="text-uppercase text-primary">Hi-Tech Officail website | <span class="text-warning fs-5">Admin panel</span></h2>
                            </nav>
                
                            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            {{-- <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                <form class="navbar-left navbar-form nav-search">
                                    <div class="input-group">
                                    <input type="text" placeholder="Search ..." class="form-control" />
                                    </div>
                                </form>
                                </ul>
                            </li> --}}


                            {{-- <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                                <li>
                                    <div class="dropdown-title d-flex justify-content-between align-items-center">
                                    Messages
                                    <a href="#" class="small">Mark all as read</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        <a href="#">
                                        <div class="notif-img">
                                            <img src="assets/img/jm_denis.jpg" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Jimmy Denis</span>
                                            <span class="block"> How are you ? </span>
                                            <span class="time">5 minutes ago</span>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="notif-img">
                                            <img src="assets/img/chadengle.jpg" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Chad</span>
                                            <span class="block"> Ok, Thanks ! </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="notif-img">
                                            <img src="assets/img/mlane.jpg" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Jhon Doe</span>
                                            <span class="block">
                                            Ready for the meeting today...
                                            </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="notif-img">
                                            <img src="assets/img/talha.jpg" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="subject">Talha</span>
                                            <span class="block"> Hi, Apa Kabar ? </span>
                                            <span class="time">17 minutes ago</span>
                                        </div>
                                        </a>
                                    </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all
                                    messages<i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">
                                    You have 4 new notification
                                    </div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        <a href="#">
                                        <div class="notif-icon notif-primary">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="notif-content">
                                            <span class="block"> New user registered </span>
                                            <span class="time">5 minutes ago</span>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="notif-icon notif-success">
                                            <i class="fa fa-comment"></i>
                                        </div>
                                        <div class="notif-content">
                                            <span class="block">
                                            Rahmad commented on Admin
                                            </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="notif-img">
                                            <img src="assets/img/profile2.jpg" alt="Img Profile" />
                                        </div>
                                        <div class="notif-content">
                                            <span class="block">
                                            Reza send messages to you
                                            </span>
                                            <span class="time">12 minutes ago</span>
                                        </div>
                                        </a>
                                        <a href="#">
                                        <div class="notif-icon notif-danger">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="notif-content">
                                            <span class="block"> Farrah liked Admin </span>
                                            <span class="time">17 minutes ago</span>
                                        </div>
                                        </a>
                                    </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all
                                    notifications<i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                                </ul>
                            </li> --}}


                            {{-- <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                                </a>
                                <div class="dropdown-menu quick-actions animated fadeIn">
                                <div class="quick-actions-header">
                                    <span class="title mb-1">Quick Actions</span>
                                    <span class="subtitle op-7">Shortcuts</span>
                                </div>
                                <div class="quick-actions-scroll scrollbar-outer">
                                    <div class="quick-actions-items">
                                    <div class="row m-0">
                                        <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-danger rounded-circle">
                                            <i class="far fa-calendar-alt"></i>
                                            </div>
                                            <span class="text">Calendar</span>
                                        </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-warning rounded-circle">
                                            <i class="fas fa-map"></i>
                                            </div>
                                            <span class="text">Maps</span>
                                        </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-info rounded-circle">
                                            <i class="fas fa-file-excel"></i>
                                            </div>
                                            <span class="text">Reports</span>
                                        </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-success rounded-circle">
                                            <i class="fas fa-envelope"></i>
                                            </div>
                                            <span class="text">Emails</span>
                                        </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-primary rounded-circle">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                            </div>
                                            <span class="text">Invoice</span>
                                        </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <div class="avatar-item bg-secondary rounded-circle">
                                            <i class="fas fa-credit-card"></i>
                                            </div>
                                            <span class="text">Payments</span>
                                        </div>
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </li> --}}
                
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('backends/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                                </div>
                                <span class="profile-username">
                                    <span class="op-7">Hi,</span>
                                    <span class="fw-bold">@auth
                                        {{ @Auth::user()->name }}
                                    @endauth</span>
                                </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                        <img src="{{ asset('backends/assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded" />
                                        </div>
                                        <div class="u-text">
                                        <h4>@auth
                                            {{ @Auth::user()->name }}
                                        @endauth</h4>
                                        {{-- <p class="text-muted">
                                        @auth
                                            {{ @Auth::user()->email }}
                                        @endauth</p> --}}
                                        <a href="{{ route('profile') }}" class="btn btn-xs btn-secondary btn-sm">{{ @Auth::user()->role == 'superadmin' ? 'Super admin' : 'Admin' }}</a>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a>
                                    {{-- <a class="dropdown-item" href="#">My Balance</a>
                                    <a class="dropdown-item" href="#">Inbox</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('profile.password') }}"><i class="fa fa-cog" aria-hidden="true"></i> Password Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                    </li>
                                </div>
                                </ul>
                            </li>
                            </ul>
                        </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                

                    <div class="container" id="master-content">
                        <div class="page-inner">
                            @yield('content')
                        </div>
                    </div>
            
                {{-- end main content  --}}

                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="copyright">
                            {{-- 2024, made with <i class="fa fa-heart heart text-danger"></i> by
                            <a href="http://www.themekita.com">ThemeKita</a> --}}
                        </div>
                        <div>
                            <i class="far fa-copyright ui blue" aria-hidden="true"></i> SL Hi-Tech Co., LTD | Department IT - 2025
                            {{-- <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>. --}}
                        </div>
                    </div>
                </footer>
            </div>
        
        <!-- Custom template | don't include it in your project! -->
            {{-- <div class="custom-template">
                <div class="title">Settings</div>
                <div class="custom-content">
                    <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                        <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                        <br />
                        <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                        <button type="button" class="changeTopBarColor" data-color="dark"></button>
                        <button type="button" class="changeTopBarColor" data-color="blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="green"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange"></button>
                        <button type="button" class="changeTopBarColor" data-color="red"></button>
                        <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                        <br />
                        <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                        <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="green2"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                        <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                        <button type="button" class="changeSideBarColor" data-color="white"></button>
                        <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="custom-toggle">
                    <i class="icon-settings"></i>
                </div>
            </div> --}}
        <!-- End Custom template -->
    </div>



{{-- SCRIPT  --}}
    <!--   Core JS Files   -->
    <script src="{{ asset('backends/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backends/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backends/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('backends/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('backends/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{ asset('backends/assets/js/kaiadmin.min.js') }}"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('backends/assets/js/setting-demo2.js') }}"></script>

     <!-- Chart JS -->
    <script src="{{ asset('backends/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('backends/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('backends/assets/js/plugin/chart-circle/circles.min.js') }}"></script>


    <!-- Bootstrap Notify -->
    <script src="{{ asset('backends/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('backends/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backends/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('backends/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('backends/assets/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('backends/assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('backends/assets/js/demo.js') }}"></script>
    <script src="{{ asset('backends/assets/ui-css/semantic.js') }}"></script>
    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>

    <script src="{{ asset('backends/assets/js/sweetalert/sweetalert2.all.min.js') }}"></script>

    {{-- text editor --}}
    <script src="{{ asset('backends/assets/text-editor/summernote.min.js')}}"></script>
    <script src="{{ asset('backends/assets/text-editor/summernote-lite.min.js')}}"></script>
    {{-- <script src="{{ asset('backends/assets/css/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="{{ asset('backends/assets/js/my-js/my-js.js') }}"></script>

{{-- SCRIPT  --}}

    @if (session()->has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            });
        </script>
    @endif

    <script>
        function windowLoad(){
            $('#window-preload').removeClass('d-none');
            $('#window-preload').fadeOut('slow', function() {
                $('.content').fadeIn('slow'); 
            });
        }

        function submitPreload(){
            $('#preloader').removeClass('d-none');
            $('.preloader').fadeOut('slow', function() {
                $('.content').fadeIn('slow'); 
            });
        }

        //$(window).on('load', windowLoad());

        $(document).ready(function() {
            // windowLoad() = null;

            $('button[type="submit"]').on('click', function() {
                submitPreload();
                $(window).on('beforeunload', function() {
                    $('.body').css('cursor', 'progress');
                });
                $(window).on('load', function() {
                    $('.body').css('cursor', 'default'); // or any other cursor style you prefer
                });
            });

            // windowLoad();
        });

    </script>
    @yield('js')

    </body>
</html>
