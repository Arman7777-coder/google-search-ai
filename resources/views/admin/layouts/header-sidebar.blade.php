<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8"/>
    <title>Transform | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->


    <link href="{{asset('admin-src/libs/toastr/build/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App css -->
    <link href="{{asset('admin-src/css/app.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- icons -->
    <link href="{{asset('admin-src/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    @yield('styles')

</head>

<!-- body start -->
<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
      data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
      data-sidebar-user='true'>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-end mb-0">

            {{--            <li class="d-none d-lg-block">--}}
            {{--                <form class="app-search">--}}
            {{--                    <div class="app-search-box">--}}
            {{--                        <div class="input-group">--}}
            {{--                            <input type="text" class="form-control" placeholder="Search..." id="top-search">--}}
            {{--                            <button class="btn input-group-text" type="submit">--}}
            {{--                                <i class="fe-search"></i>--}}
            {{--                            </button>--}}
            {{--                        </div>--}}
            {{--                        <div class="dropdown-menu dropdown-lg" id="search-dropdown">--}}
            {{--                            <!-- item-->--}}
            {{--                            <div class="dropdown-header noti-title">--}}
            {{--                                <h5 class="text-overflow mb-2">Found 22 results</h5>--}}
            {{--                            </div>--}}

            {{--                            <!-- item-->--}}
            {{--                            <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                                <i class="fe-home me-1"></i>--}}
            {{--                                <span>Analytics Report</span>--}}
            {{--                            </a>--}}

            {{--                            <!-- item-->--}}
            {{--                            <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                                <i class="fe-aperture me-1"></i>--}}
            {{--                                <span>How can I help you?</span>--}}
            {{--                            </a>--}}

            {{--                            <!-- item-->--}}
            {{--                            <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                                <i class="fe-settings me-1"></i>--}}
            {{--                                <span>User profile settings</span>--}}
            {{--                            </a>--}}

            {{--                            <!-- item-->--}}
            {{--                            <div class="dropdown-header noti-title">--}}
            {{--                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>--}}
            {{--                            </div>--}}

            {{--                            <div class="notification-list">--}}
            {{--                                <!-- item-->--}}
            {{--                                <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                                    <div class="d-flex align-items-start">--}}
            {{--                                        <img class="d-flex me-2 rounded-circle"--}}
            {{--                                             src="{{asset('admin-src/images/users/user-2.jpg')}}"--}}
            {{--                                             alt="Generic placeholder image" height="32">--}}
            {{--                                        <div class="w-100">--}}
            {{--                                            <h5 class="m-0 font-14">Erwin E. Brown</h5>--}}
            {{--                                            <span class="font-12 mb-0">UI Designer</span>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </a>--}}

            {{--                                <!-- item-->--}}
            {{--                                <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                                    <div class="d-flex align-items-start">--}}
            {{--                                        <img class="d-flex me-2 rounded-circle"--}}
            {{--                                             src="{{asset('admin-src/images/users/user-5.jpg')}}"--}}
            {{--                                             alt="Generic placeholder image" height="32">--}}
            {{--                                        <div class="w-100">--}}
            {{--                                            <h5 class="m-0 font-14">Jacob Deo</h5>--}}
            {{--                                            <span class="font-12 mb-0">Developer</span>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </a>--}}
            {{--                            </div>--}}

            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </li>--}}

            <li class="dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..."
                               aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="d-none d-lg-block">
                <a id="light-dark-mode" role="button" href="javascript:void(0)"
                   class="nav-link dropdown-toggle waves-effect waves-light">
                    <i class="mdi mdi-moon-waning-crescent"></i>
                </a>
            </li>

            {{--            <li class="dropdown notification-list topbar-dropdown">--}}
            {{--                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"--}}
            {{--                   role="button" aria-haspopup="false" aria-expanded="false">--}}
            {{--                    <i class="fe-bell noti-icon"></i>--}}
            {{--                    <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu dropdown-menu-end dropdown-lg">--}}

            {{--                    <!-- item-->--}}
            {{--                    <div class="dropdown-item noti-title">--}}
            {{--                        <h5 class="m-0">--}}
            {{--                                        <span class="float-end">--}}
            {{--                                            <a href="" class="text-dark">--}}
            {{--                                                <small>Clear All</small>--}}
            {{--                                            </a>--}}
            {{--                                        </span>Notification--}}
            {{--                        </h5>--}}
            {{--                    </div>--}}

            {{--                    <div class="noti-scroll" data-simplebar>--}}

            {{--                        <!-- item-->--}}
            {{--                        <a href="javascript:void(0);" class="dropdown-item notify-item active">--}}
            {{--                            <div class="notify-icon">--}}
            {{--                                <img src="{{asset('admin-src/images/users/user-1.jpg')}}"--}}
            {{--                                     class="img-fluid rounded-circle" alt=""/>--}}
            {{--                            </div>--}}
            {{--                            <p class="notify-details">Cristina Pride</p>--}}
            {{--                            <p class="text-muted mb-0 user-msg">--}}
            {{--                                <small>Hi, How are you? What about our next meeting</small>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}

            {{--                        <!-- item-->--}}
            {{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                            <div class="notify-icon bg-primary">--}}
            {{--                                <i class="mdi mdi-comment-account-outline"></i>--}}
            {{--                            </div>--}}
            {{--                            <p class="notify-details">Caleb Flakelar commented on Admin--}}
            {{--                                <small class="text-muted">1 min ago</small>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}

            {{--                        <!-- item-->--}}
            {{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                            <div class="notify-icon">--}}
            {{--                                <img src="{{asset('admin-src/images/users/user-4.jpg')}}"--}}
            {{--                                     class="img-fluid rounded-circle" alt=""/>--}}
            {{--                            </div>--}}
            {{--                            <p class="notify-details">Karen Robinson</p>--}}
            {{--                            <p class="text-muted mb-0 user-msg">--}}
            {{--                                <small>Wow ! this admin looks good and awesome design</small>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}

            {{--                        <!-- item-->--}}
            {{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                            <div class="notify-icon bg-warning">--}}
            {{--                                <i class="mdi mdi-account-plus"></i>--}}
            {{--                            </div>--}}
            {{--                            <p class="notify-details">New user registered.--}}
            {{--                                <small class="text-muted">5 hours ago</small>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}

            {{--                        <!-- item-->--}}
            {{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                            <div class="notify-icon bg-info">--}}
            {{--                                <i class="mdi mdi-comment-account-outline"></i>--}}
            {{--                            </div>--}}
            {{--                            <p class="notify-details">Caleb Flakelar commented on Admin--}}
            {{--                                <small class="text-muted">4 days ago</small>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}

            {{--                        <!-- item-->--}}
            {{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
            {{--                            <div class="notify-icon bg-secondary">--}}
            {{--                                <i class="mdi mdi-heart"></i>--}}
            {{--                            </div>--}}
            {{--                            <p class="notify-details">Carlos Crouch liked--}}
            {{--                                <b>Admin</b>--}}
            {{--                                <small class="text-muted">13 days ago</small>--}}
            {{--                            </p>--}}
            {{--                        </a>--}}
            {{--                    </div>--}}

            {{--                    <!-- All-->--}}
            {{--                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">--}}
            {{--                        View all--}}
            {{--                        <i class="fe-arrow-right"></i>--}}
            {{--                    </a>--}}

            {{--                </div>--}}
            {{--            </li>--}}
{{--            <li class="dropdown notification-list topbar-dropdown">--}}
{{--                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"--}}
{{--                   role="button">--}}
{{--                    <i class="fe-bell noti-icon"></i>--}}
{{--                    @if($notifications->where('is_read', false)->count() > 0)--}}
{{--                        <span class="badge bg-danger rounded-circle noti-icon-badge">--}}
{{--                        {{ $notifications->where('is_read', false)->count() }}--}}
{{--                    @endif--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-end dropdown-lg">--}}
{{--                    <div class="dropdown-item noti-title">--}}
{{--                        <h5 class="m-0">Notifications</h5>--}}
{{--                    </div>--}}

{{--                    <div class="noti-scroll" data-simplebar>--}}
{{--                        @foreach($notifications as $notification)--}}
{{--                                <form id="markAsReadForm_{{ $notification->id }}"--}}
{{--                                      action="{{ route('notifications.markAsRead', $notification->id) }}" method="post"--}}
{{--                                      style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                                <a--}}
{{--                                    @if(auth()->user()->hasRole('admin'))--}}
{{--                                        href="{{ route('lessons.index') }}"--}}
{{--                                    @else--}}
{{--                                        href="{{ route('teacher-lessons.index') }}"--}}
{{--                                    @endif class="dropdown-item notify-item"--}}
{{--                                   onclick="event.preventDefault(); document.getElementById('markAsReadForm_{{ $notification->id }}').submit();">--}}
{{--                                    <div class="notify-icon bg-primary">--}}
{{--                                        <i class="mdi mdi-comment-account-outline"></i>--}}
{{--                                    </div>--}}
{{--                                    <p class="notify-details">{{ $notification->title }}</p>--}}
{{--                                    <p class="text-muted mb-0">{{ $notification->message }}</p>--}}
{{--                                </a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if(auth()->check() && auth()->user()->avatar)
                        <img src="{{asset(auth()->user()->avatar) }}" alt="user-image" class="rounded-circle">
                    @else
                        <img src="{{asset('admin-src/images/users/user-1.jpg')}}" alt="user-image"
                             class="rounded-circle">
                    @endif
                    <span class="pro-user-name ms-1">
                                    {{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('profile.index')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                       class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('admin.dashboard')}}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{asset('/logo.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('/logo.png')}}" alt="" height="48">
                </span>
            </a>
            <a href="{{route('admin.dashboard')}}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{asset('/logo.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('/logo.png')}}" alt="" height="48">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
            <li>
                <button class="button-menu-mobile disable-btn waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <h4 class="page-title-main">@yield('title', 'Dashboard')</h4>
            </li>

        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">
                    @can(\App\Enum\PermissionEnum::VIEW_ADMIN_DASHBOARD->value)
                        <li>
                            <a href="/admin">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                    @endcan
                    @can(\App\Enum\PermissionEnum::VIEW_USERS->value)
                        <li>
                            <a href="#sidebarUsers" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-box-multiple"></i>
                                <span> Users </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse hide" id="sidebarUsers">
                                <ul class="nav-second-level">
                                    @can(\App\Enum\PermissionEnum::CREATE_USER->value)
                                        <li>
                                            <a href="{{route('users.create')}}" class="btn text-start">
                                                <i class="mdi mdi-briefcase-outline"></i>
                                                <span>Create a new user</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can(\App\Enum\PermissionEnum::VIEW_USERS->value)
                                        <li>
                                            <a href="{{route('users.index')}}" class="btn text-start">
                                                <i class="mdi mdi-account-alert"></i>
                                                <span>All Users</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can(\App\Enum\PermissionEnum::VIEW_ROLES_AND_PERMISSIONS->value)
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-account-search-outline"></i>
                                                <span> Roles And Permissions </span>
                                            </a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a href="{{route('login_info')}}">
                                            <i class="mdi mdi-account-alert"></i>
                                            <span> Login Info </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan





                </ul>
            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    @yield('content')
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor -->
<script src="{{asset('admin-src/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin-src/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin-src/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin-src/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('admin-src/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin-src/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('admin-src/libs/feather-icons/feather.min.js')}}"></script>

<!-- knob plugin -->
<script src="{{asset('admin-src/libs/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('admin-src/libs/toastr/build/toastr.min.js')}}"></script>

<!-- App js-->
<script src="{{asset('admin-src/js/app.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        let themeFromStorage = localStorage.getItem('theme')
        let themeIconFromStorage = localStorage.getItem('theme-icon')
        if (themeFromStorage && themeIconFromStorage) {
            document.body.setAttribute('data-layout-color', themeFromStorage)
            document.body.setAttribute('data-topbar-color', themeFromStorage)
            document.body.setAttribute('data-leftbar-color', themeFromStorage)
            $('#light-dark-mode i').removeClass('mdi mdi-moon-waning-crescent').removeClass('ti-shine').addClass(themeIconFromStorage)
        }
        $('#light-dark-mode').on('click', function () {
            let currentTheme = document.body.getAttribute('data-layout-color')
            let newTheme = 'light'
            let themeIconClass = 'mdi mdi-moon-waning-crescent'
            if (currentTheme === 'light') {
                newTheme = 'dark'
                themeIconClass = 'ti-shine'
            }
            document.body.setAttribute('data-layout-color', newTheme)
            document.body.setAttribute('data-topbar-color', newTheme)
            document.body.setAttribute('data-leftbar-color', newTheme)
            $(this).find('i').removeClass('mdi mdi-moon-waning-crescent').removeClass('ti-shine').addClass(themeIconClass)
            localStorage.setItem('theme', newTheme)
            localStorage.setItem('theme-icon', themeIconClass)
        })
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.error('{{ $error }}')
        @endforeach
        @endif
    })
</script>
@yield('scripts')

</body>
</html>
