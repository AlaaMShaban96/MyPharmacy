@php
    if (auth()->user()->status) {
        if (isset(auth()->user()->pharmacy->orders)) {
            $notifications = auth()
                ->user()
                ->pharmacy->orders()
                ->whereHas('pharmacies', function ($q) {
                    $q->where('orders_pharmacies.status', 1);
                })
                ->take(8)
                ->get();
        } else {
            $notifications = [];
        }
    }
    
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>لوحة التحكم</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
    <style>
        body {
            font-family: Sukar;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, .8);
            z-index: 999;
            opacity: 1;
            transition: all 0.5s;
        }

        /*Spinner Styles*/
        .lds-dual-ring {
            display: inline-block;
            /* width: 80px;
        height: 80px; */
        }
    </style>
    @livewireStyles
</head>

<body>
    <div class="main-content " id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom ">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav align-items-center text-center ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->

                        </li>

                        @if (auth()->user()->status)
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ni ni-bell-55"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden"style="text-align: right;">
                                    <!-- Dropdown header -->
                                    <div class="px-3 py-3">
                                        <h6 class="text-sm text-muted m-0">لديك <strong
                                                class="text-primary">{{ $notifications != [] ? $notifications->count() : 0 }}</strong>
                                            طلبات مرسلة الي صيدلية</h6>
                                    </div>
                                    <!-- List group notfction -->
                                    <div class="list-group list-group-flush">
                                        @forelse ($notifications as $order)
                                            <a href="#!" class="list-group-item list-group-item-action">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <!-- Avatar -->
                                                        <img alt="Image placeholder"
                                                            src="{{ $order->user->image == null ? asset('assets/img/theme/team-1.jpg') : $order->user->image }}"
                                                            class="avatar rounded-circle">
                                                    </div>


                                                    <div class="col ml--2">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h4 class="mb-0 text-sm">{{ $order->user->name }}</h4>
                                                            </div>
                                                            <div class="text-right text-muted">
                                                                <small>{{ $order->created_at->diffForHumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <p class="text-sm mb-0">{{ $order->text }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                            <h3 class="text-center">لا يوجد اشعارات</h3>
                                        @endforelse

                                    </div>
                                    <!-- View all -->
                                    @if (count($notifications) > 8)
                                        <a href="{{ url('/my-oreders') }}"
                                            class="dropdown-item text-center text-primary font-weight-bold py-3">عرض كل
                                            الطلبات</a>
                                    @endif
                                </div>
                            </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm ">
                                        <img alt="Image placeholder"
                                            src="{{ auth()->user()->image == null ? asset('assets/img/theme/team-1.jpg') : auth()->user()->image }}">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">


                                @if (auth()->user()->status)
                                    <a href="{{ url('/profile') }}" class="dropdown-item">
                                        <i class="ni ni-single-02"></i>
                                        <span>حسابي</span>
                                    </a>
                                    <a href="{{ url('/dashboard') }}" class="dropdown-item">
                                        <i class="ni ni-settings-gear-65"></i>
                                        <span>الصفحة الرئسية</span>
                                    </a>
                                    <a href="{{ url('/my-oreders') }}" class="dropdown-item">
                                        <i class="ni ni-support-16"></i>
                                        <span>الطلبات الخاصة</span>
                                    </a>
                                    <a href="{{ url('/advertisings') }}" class="dropdown-item">
                                        <i class="ni ni-support-16"></i>
                                        <span>اعلانات</span>
                                    </a>
                                    <a href="{{ url('/records') }}" class="dropdown-item">
                                        <i class="ni ni-collection"></i>
                                        <spaPerformancen>سجل الردود</span>
                                    </a>
                                @else
                                    <a href="{{ url('admin/dashboard') }}" class="dropdown-item">
                                        <i class="ni ni-settings-gear-65"></i>
                                        <span>الصفحة الرئسية</span>
                                    </a>
                                    <a href="{{ url('admin/users') }}" class="dropdown-item">
                                        <i class="ni ni-single-02"></i>

                                        <span>الزبائن</span>
                                    </a>
                                    <a href="{{ url('admin/pharmacies') }}" class="dropdown-item">
                                        <i class="ni ni-archive-2"></i>
                                        <span>الصيداليات</span>
                                    </a>
                                @endif

                                <div class="dropdown-divider"></div>
                                <a href="{{ url('admin/logout') }}" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>تسجيل الخروج</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- your content here -->
        {{ $slot }}
        {{-- @yield('content') --}}



    </div>
    <script>
        Object.size = function(obj) {
            var size = 0,
                key;
            for (key in obj) {
                if (obj.hasOwnProperty(key)) size++;
            }
            return size;
        };
        var data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        for (key in months) {
            console.log(key);

            switch (key) {
                case '01':
                    data[0] = Object.size(months[key]);
                    break;
                case '02':
                    data[1] = Object.size(months[key]);
                    break;
                case '03':
                    data[2] = Object.size(months[key]);
                    break;
                case '04':
                    data[3] = Object.size(months[key]);
                    break;
                case '05':
                    data[4] = Object.size(months[key]);
                    break;
                case '06':
                    data[5] = Object.size(months[key]);
                    break;
                case '07':
                    data[6] = Object.size(months[key]);
                    break;
                case '08':
                    data[7] = Object.size(months[key]);
                    break;
                case '09':
                    data[8] = Object.size(months[key]);
                    break;
                case '10':
                    data[9] = Object.size(months[key]);
                    break;
                case '11':
                    data[10] = Object.size(months[key]);
                    break;
                case '12':
                    data[11] = Object.size(months[key]);
                    break;


            }

        };
        //         console.log(data);
    </script>

    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
    <script>
        $(document).ready(function() {
            $(".show-order").click(function() {
                console.log($(this).data('name'));
                $('#order-img-url').attr('src', $(this).data('img-url'));
                $('#order-text').text($(this).data('text'));
                $('#order-name').text($(this).data('name'));
                $('#exampleModal').modal('show');
            });
            $(".show-img-url").click(function() {
                $('#ad-img-url').attr('src', $(this).data('img-url'));
                $('#ad-textt').text($(this).data('text'));
                $('#ad-date').text($(this).data('date'));
                $('#adModal').modal('show');
            });
        });


        window.addEventListener('success-tost', event => {

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'تم ' + event.detail.action + ' بنجاح '
            })


        })
        window.addEventListener('error-tost', event => {

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: 'يوجد خطأ في عملية ' + event.detail.action
            })


        })
    </script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
