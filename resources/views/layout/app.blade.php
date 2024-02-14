<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App css -->
    <link href="{{ asset('assets/css2/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css2/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/css2/bootstrap-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('assets/css2/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- <link rel="stylesheet" href="{{ asset('public/assets/style.css') }}"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>

<body data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <!-- All-->
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle" />
                            <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome ! {{ Auth::user()->name }}</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>

                        <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <span class="logo-lg-text-light">GST-B</span>
                        </span>
                        <span class="logo-lg">
                            <span class="logo-lg-text-light">GST-B</span>
                        </span>
                    </a>

                    <a href="" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <span class="logo-lg-text-light">GST-B</span>
                        </span>
                        <span class="logo-lg">
                            <span class="logo-lg-text-light">GST-B</span>
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!--Include left sidebar-->
        @include('include/sidebar')

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                @yield('content')

            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js2/vendor.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('assets/libs2/flatpickr/flatpickr.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/libs2/apexcharts/apexcharts.min.js') }}"></script> -->

    <!-- Dashboar 1 init js-->
    <!-- <script src="{{ asset('assets/js2/pages/dashboard-1.init.js') }}"></script> -->

    <!-- App js-->
    <script src="{{ asset('assets/js2/app.min.js') }}"></script>

    <script src="{{ asset('assets/script.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            @foreach (['error', 'warning', 'success', 'info'] as $msg)
                @if (Session::has($msg))
                    var type = '{{ $msg }}';
                    var msg = '{{ Session::get($msg) }}';
                    switch (type) {
                        case 'success':
                            toastr.success(msg);
                            break;

                        case 'error':
                            toastr.error(msg);
                            break;

                        case 'warning':
                            toastr.warning(msg);
                            break;

                        case 'info':
                            toastr.info(msg);
                            break;
                    }
                @endif
            @endforeach
        });

        // destroyFunctionAjax = null;
function destroyFunction(id) {
    // var id = $(e).attr("data-id");
    // var url = $(e).attr("data-url");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        customClass: {
            confirmButton: "btn btn-sm btn-success",
            cancelButton: "btn btn-sm btn-danger",
        },
    }).then(function (result) {
        if (result.value) {

            destroyFunctionAjax = $.ajax({
                method: "POST",
                url: url,
                data: {
                    id: id,
                    // _method: "delete",
                    _token: csrfToken,
                },
                beforeSend: function () {
                    // if (destroyFunctionAjax != null) {
                    //     destroyFunctionAjax.abort();
                    // }
                },
                success: function (resultData) {
                    // $("#confirm_delete_btn").DataTable().ajax.reload();
                    toastr.info("Party Account Deleted Successfully");

                    location.reload();
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    if (jqXHR.status == 401 || jqXHR.status == 419) {
                        console.log(jqXHR.status);
                        Swal.fire({
                            title: "Session Expired",
                            text: "You'll be take to the login page",
                            icon: "warning",
                            confirmButtonText: "Ok",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: "btn btn-sm btn-success",
                            },
                        }).then(function (result) {
                            location.reload();
                            return false;
                        });
                    } else {
                        toastr.error(jqXHR.responseJSON.message);
                    }
                },
            });
        }
    });
}
 

    </script>

</body>

</html>
