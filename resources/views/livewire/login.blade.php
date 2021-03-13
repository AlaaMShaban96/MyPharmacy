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
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center" role="alert">
                      <strong>خطاء!</strong> {{$error}}
                    </div>
                  @endforeach
              @endif  
              
              <form role="form" wire:submit.prevent="login" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" wire:model.lazy="user.email" name="email" placeholder="البريد الالكتروني" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" wire:model.lazy="user.password" name="password" placeholder="كلمة السر" type="password">
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
