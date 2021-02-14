@php
$notifications=auth()->user()->pharmacy->orders()->whereHas('pharmacies', function($q) {
            $q->where('orders_pharmacies.status', 0);
          })->get();    
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
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <style>
    body{
        font-family: Sukar;
    }
    </style>
    @livewireStyles

    
   
   
  </head>

  <body>
    <div class="main-content" id="panel">
      <!-- Topnav -->
      <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav align-items-center  ml-md-auto ">
              <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>
              <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                  <i class="ni ni-zoom-split-in"></i>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                  <!-- Dropdown header -->
                  <div class="px-3 py-3">
                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{$notifications->count()}}</strong> notifications.</h6>
                  </div>
                  <!-- List group notfction -->
                  <div class="list-group list-group-flush">
                    @forelse ($notifications as $order)
                    <a href="#!" class="list-group-item list-group-item-action">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <img alt="Image placeholder" src="{{$order->user->image==""?'../assets/img/theme/team-1.jpg':$order->user->image}}" class="avatar rounded-circle">
                        </div>
                   

                         <div class="col ml--2">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="mb-0 text-sm">{{$order->user->name}}</h4>
                            </div>
                            <div class="text-right text-muted">
                              <small>2 hrs ago</small>
                            </div>
                          </div>
                          <p class="text-sm mb-0">{{$order->text}}</p>
                        </div>
                      </div>
                    </a>         
                    @empty
                    <h3 class="text-center">لا يوجد اشعارات</h3>
                    @endforelse
                   
                  </div>
                  <!-- View all -->
                  <a href="{{url('/my-oreders')}}" class="dropdown-item text-center text-primary font-weight-bold py-3">عرض كل الطلبات</a>
                </div>
              </li>
             
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="{{auth()->user()->image==""?'assets/img/theme/team-4.jpg':auth()->user()->image}}">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->name}}</span>
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right ">
                 
                  <a href="#!"  class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>حسابي</span>
                  </a>
                  <a href="{{url('/dashboard')}}" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>الصفحة الرئسية</span>
                  </a>
                
                  <a href="{{url('/my-oreders')}}" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>طلباتي</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#!" class="dropdown-item">
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

    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.2.0"></script>
 
  @livewireScripts
</body>

</html>
