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
  <title>تسجيل الدخول</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/logo.jpg')}}" type="image/png">
  <!-- Fonts -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> --}}
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">

  <style>
    body{
        font-family: Sukar;
      }
      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0,0,0,.8);
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

<body class="bg-default">
 
  {{ $slot }}

  @livewireScripts
 
 
</body>

</html>