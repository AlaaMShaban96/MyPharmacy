<div class="main-content">

    <div class="container-fluid text-center mt-6">
        <div class="card">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger text-center" role="alert">
                <strong>خطاء!</strong> {{$error}}
              </div>
            @endforeach
        @endif 
        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class') }} text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="x">
                <i class="material-icons">close</i>
            </button>
            <p class="h4" >{{ Session::get('message') }}</p> 
            </div>
        @endif
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">تعديل بيانات صيدالية</h3>
                </div>
                <form role="form" wire:submit.prevent="save" method="POST">
                <div class="col-4 text-right">
                  {{-- <a href="#!" class="btn btn-sm btn-success">حفظ</a> --}}
                  <button type="submit" class="btn btn-sm btn-success">حفظ </button>

                </div>
              </div>
            </div>
            <div class="card-body">
          
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label " for="input-username">اسم صيدالية</label>
                        <input type="text" id="input-username"wire:model.lazy="user.name" class="form-control  text-right" placeholder="اسم صيدالية" value="{{auth()->user()->pharmacy->name}}" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label " for="input-email">البريد الالكتروني</label>
                        <input type="email" id="input-email" disabled class="form-control  text-right" placeholder="info@nano-tech.ly" value='{{auth()->user()->email}}'>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label " for="input-first-name">اسم المستخدم</label>
                        <input type="text" id="input-first-name"wire:model.lazy="user.username" class="form-control  text-right" placeholder="المستخدم الرائسي" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label " for="input-last-name">كلمة السر</label>
                        <input type="password" id="input-last-name" wire:model.lazy="user.password" class="form-control  text-right" placeholder="كلمة السر" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label " for="input-last-name">خط الطول على الخريطة</label>
                        <input type="text" id="input-last-name" class="form-control  text-right" wire:model.lazy="user.x"placeholder="x" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label " for="input-last-name"> خط العرض على الخريطة</label>
                        <input type="text" id="input-last-name" class="form-control  text-right"wire:model.lazy="user.y" placeholder="y">
                      </div>
                    </div> 
                    {{-- <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label " for="input-last-name"> الصورة شعار صيدالية</label>
                        <input type="text" id="input-last-name" class="form-control  text-right"wire:model.lazy="user.y" placeholder="y">
                      </div>
                    </div> --}}
                  </div>
                </div>
              </form>
            </div>
          </div>
    </div>
</div> 