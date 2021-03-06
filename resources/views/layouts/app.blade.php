{{-- <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('js/bootstrap.js') }}" rel="stylesheet">
    <style>
        body
        {
            overflow-x: hidden;
        }
        
    </style>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->employee->emp_first_name }} 

                                    @if(Auth::user()->employee->emp_middle_name != "")
                                        {{" " . Auth::user()->employee->emp_middle_name}}
                                    @endif

                                    @if(Auth::user()->employee->emp_last_name != "")
                                        {{" " . Auth::user()->employee->emp_last_name}}
                                    @endif

                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html> --}}

<!--#####################################################NEW PARTIAL VIEW################################################-->

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from colorlib.com/polygon/elaadmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Aug 2018 05:25:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("images/logo.png")}}">
    <title>RCDK</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset("dashboard/css/lib/bootstrap/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="{{asset("dashboard/css/lib/calendar2/semantic.ui.min.css")}}" rel="stylesheet">
    <link href="{{asset("dashboard/css/lib/calendar2/pignose.calendar.min.css")}}" rel="stylesheet">
    <link href="{{asset("dashboard/css/lib/owl.carousel.min.css")}}" rel="stylesheet" />
    <link href="{{asset("dashboard/css/lib/owl.theme.default.min.css")}}" rel="stylesheet" />
    <link href="{{asset("dashboard/css/helper.css")}}" rel="stylesheet">
    <link href="{{asset("dashboard/css/style.css")}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('style')
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b><img src="{{asset("images/logo1.png")}}" alt="homepage" class="dark-logo" /></b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                <span>RCDK
                    <!-- Below part will show user type if loged in-->
                    @guest
                        @if(Route::currentRouteName() == "login")
                            Login
                        @endif
                    @else
                        {{Auth::user()->role->name}}
                    @endguest
                </span>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                        <!-- Messages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset("images/users/5.jpg")}}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset("images/users/2.jpg")}}" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>John Doe</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset("images/users/3.jpg")}}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Mr. John</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{asset("images/users/4.jpg")}}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Michael Qin</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->employee->emp_first_name }} 

                                @if(Auth::user()->employee->emp_middle_name != "")
                                    {{" " . Auth::user()->employee->emp_middle_name}}
                                @endif

                                @if(Auth::user()->employee->emp_last_name != "")
                                    {{" " . Auth::user()->employee->emp_last_name}}
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="{{route('profile.edit')}}"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    @guest

    @else
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-label">MENU</li>


                        <?php 
                        if(Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Modarator")
                        {
                        ?>
                        <!-- Mother Company Menu-->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Mother Company </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('mothercompany.index')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('mothercompany.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Sub Company Menu-->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Sub Company </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('subcompany.index')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('subcompany.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Broker Company Menu-->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Broker Company </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('brokercompany.index')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('brokercompany.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Company Relation Menu-->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Mother Sub Company Relation</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('msrelation.index')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('msrelation.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Broker Company Relation -->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Broker Company Relation</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('brelation.index')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('brelation.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Policy Master -->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Policy Master</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('policymaster.home')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('policymaster.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Policy Order -->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Policy Order</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('policyorder.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Order Payment Status -->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Policy Payment Status</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('policyrecoverydata.home')}}" class="">Show All</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Payment Related Status -->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Payment Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('paymentreceive.home')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('paymentreceive.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        }

                        if(Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Modarator" || Auth::user()->role->name == "Viewer")
                        {
                        ?>

                        <!-- Order Statement -->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Order Statement</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('orderstatement.create')}}" class="">Statement Query</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        }
                        if(Auth::user()->role->name == "SpecialAdmin")
                        {
                        ?>
                        <!-- Policy Master -->
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Policy Master</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('policymaster.home')}}" class="">Show All</a>
                                </li>
                                <li><a href="{{route('policymaster.create')}}" class="">Add</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        }
                        if(Auth::user()->role->name == "SubBroker")
                        {
                        ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Details Info</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('subbrokerdata.home')}}" class="">Show All</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        {{-- <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-map-marker"></i><span class="hide-menu">Maps</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="map-google.html">Google</a></li>
                                <li><a href="map-vector.html">Vector</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-level-down"></i><span class="hide-menu">Multi level dd</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.1</a></li>
                                <li><a href="#">item 1.2</a></li>
                                <li> <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="#">item 1.3.1</a></li>
                                        <li><a href="#">item 1.3.2</a></li>
                                        <li><a href="#">item 1.3.3</a></li>
                                        <li><a href="#">item 1.3.4</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">item 1.4</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
    @endguest
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        @yield('content')
        {{-- <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Dashboard</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div> --}}
        <!-- End Bread crumb -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved.</footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->

<!-- All Jquery -->
<script src="{{asset("dashboard/js/lib/jquery/jquery.min.js")}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset("dashboard/js/lib/bootstrap/js/popper.min.js")}}"></script>
<script src="{{asset("dashboard/js/lib/bootstrap/js/bootstrap.min.js")}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset("dashboard/js/jquery.slimscroll.js")}}"></script>
<!--Menu sidebar -->
<script src="{{asset("dashboard/js/sidebarmenu.js")}}"></script>
<!--stickey kit -->
<script src="{{asset("dashboard/js/lib/sticky-kit-master/dist/sticky-kit.min.js")}}"></script>
<!--Custom JavaScript -->


<!-- Amchart -->
<script src="{{asset("dashboard/js/lib/morris-chart/raphael-min.js")}}"></script>
<script src="{{asset("dashboard/js/lib/morris-chart/morris.js")}}"></script>
<script src="{{asset("dashboard/js/lib/morris-chart/dashboard1-init.js")}}"></script>


<script src="{{asset("dashboard/js/lib/calendar-2/moment.latest.min.js")}}"></script>
<!-- scripit init-->
<script src="{{asset("dashboard/js/lib/calendar-2/semantic.ui.min.js")}}"></script>
<!-- scripit init-->
<script src="{{asset("dashboard/js/lib/calendar-2/prism.min.js")}}"></script>
<!-- scripit init-->
<script src="{{asset("dashboard/js/lib/calendar-2/pignose.calendar.min.js")}}"></script>
<!-- scripit init-->
<script src="{{asset("dashboard/js/lib/calendar-2/pignose.init.js")}}"></script>

<script src="{{asset("dashboard/js/lib/owl-carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("dashboard/js/lib/owl-carousel/owl.carousel-init.js")}}"></script>
<script src="{{asset("dashboard/js/scripts.js")}}"></script>
<!-- scripit init-->

<script src="{{asset("dashboard/js/custom.min.js")}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
@yield('scripts')
@stack('script')
</body>


<!-- Mirrored from colorlib.com/polygon/elaadmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Aug 2018 05:26:18 GMT -->
</html>