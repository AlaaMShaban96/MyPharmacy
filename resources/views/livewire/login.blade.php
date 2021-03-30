<div class="main-content">
<div wire:loading>
     
    <div id="richList"></div>
    <div id="loader" class="lds-dual-ring  overlay text-center">
        <div style="width: 0%;height: 2;background-color: white;margin-left: 47%;margin-top: 20%;" > 
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255) none repeat scroll 0% 0%; display: block; shape-rendering: auto;border-radius: 127px;/*! width: ; */" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
          <circle cx="50" cy="50" fill="none" stroke="#93dbe9" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
          </circle>
          </svg>
    </div>
    </div>
</div>
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
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center" role="alert">
                      <strong>خطاء!</strong> {{$error}}
                    </div>
                  @endforeach
              @endif 
              @if(Session::has('done-message'))
                <div class="alert {{ Session::get('alert-class') }}" role="alert">
                  {{ Session::get('done-message') }}
                </div>
               @endif 
              
              <form role="form" wire:submit.prevent="login" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" wire:model.defer="user.email" name="email" placeholder="البريد الالكتروني" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" wire:model.defer="user.password" name="password" placeholder="كلمة السر" type="password">
                  </div>
                </div>
                
                <div class="custom-control custom-control-alternative custom-checkbox">

                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">تسجيل الدخول</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
 