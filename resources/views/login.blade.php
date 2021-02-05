<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> --}}
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">

<style>
    body{
        font-family: Sukar;
    }
</style>
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default ml-5" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 mt--8">
          <div class="card bg-secondary border-0 mb-0 ">
           
            <div class="card-body px-lg-5 py-lg-5">
            
              <img style="width: 36%;margin-left: 33%;margin-bottom: 10%;" src="{{asset('assets/img/logo.jpg')}}" alt="" srcset="">
                <div class="alert alert-danger" role="alert">
                    <strong>Danger!</strong> This is a danger alert—check it out!
                </div>
              <form role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="البريد الالكتروني" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="كلمة السر" type="password">
                  </div>
                </div>
                
                <div class="custom-control custom-control-alternative custom-checkbox">
                  {{-- <input class="custom-control-input" id=" customCheckLogin" type="checkbox"> --}}
                  {{-- <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label> --}}
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-primary my-4">تسجيل الدخول</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>