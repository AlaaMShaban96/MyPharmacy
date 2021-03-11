<div class="container-fluid mt-6 text-right">
@if ($create || $edit)
  

    @if(Session::has('message'))
    <span class="alert {{ Session::get('alert-class') }}" role="alert">
      {{ Session::get('message') }}
    </span>  
    @else
    

    
@endif

  <div class="card ">
  
    <div class="bg-white p-3 mb-3 text-center">
      <div class=" text-left">
          <button type="button" class="btn btn-warning "  wire:click="closeForm()">الغاء</button>
      </div>

      <h3>معلومات الصيدالية</h3>

      <br>
      <div class="form-row ">
          <div class="form-group col-md-4">
              <label for="inputPassword4">كلمة السر</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <input type="password" class="form-control @error('pharmacy.password') is-invalid @enderror" wire:model.lazy='pharmacy.password' name='password'  placeholder="******" required>
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('pharmacy.password') {{$message}} @enderror
                  </div>
              </div> 
          </div>
          <div class="form-group col-md-4">
              <label for="inputPassword4">البريد الالكتروني</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <input type="email" class="form-control @error('pharmacy.email') is-invalid @enderror" wire:model.lazy='pharmacy.email' name='email'  placeholder="البريد الالكتروني" required>
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('pharmacy.email') {{$message}} @enderror
                  </div>
              </div> 
          </div>
          <div class="form-group col-md-4">
              <label for="inputPassword4">اسم الصيدالية</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <input type="text" class="form-control @error('pharmacy.name') is-invalid @enderror" wire:model.lazy='pharmacy.name' name='name'  placeholder="اسم الصيدالية" required>
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('pharmacy.name') {{$message}} @enderror
                  </div>
              </div> 
          </div>

      </div>
      
      <div class="form-row ">
          <div class="form-group col-md-2">
              <label for="inputAddress">شعار الصيدالية</label>
              <div class="input-group">
                <input type="file" class="form-control @error('pharmacy.photo') is-invalid @enderror" wire:model.lazy='pharmacy.photo'  aria-label="Upload">
                <div id="validationServer05Feedback" class="invalid-feedback">
                  @error('pharmacy.photo') {{$message}} @enderror
                </div>
              </div>
          </div>
         
          <div class="form-group col-md-2">
              <label for="inputAddress">احداتيات ( Y ) </label>
              <div class="input-group ">
                  <input type="text" name='y' wire:model.lazy='pharmacy.y' class="form-control @error('pharmacy.y') is-invalid @enderror"  placeholder="y location">
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('pharmacy.y') {{$message}} @enderror
                  </div>
              </div> 
          </div>
          <div class="form-group col-md-2">
              <label for="inputAddress">احداتيات ( X ) </label>
              <div class="input-group ">
                  <input type="text" name='x' wire:model.lazy='pharmacy.x' class="form-control @error('pharmacy.x') is-invalid @enderror"  placeholder=" x location">
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('pharmacy.x') {{$message}} @enderror
                  </div>
              </div> 
          </div>
          <div class="form-group col-md-2">
            <label for="inputAddress">رقم الهاتف </label>
            <div class="input-group ">
                <input type="number" name='phone' wire:model.lazy='pharmacy.phone' class="form-control @error('pharmacy.phone') is-invalid @enderror"  placeholder="09x-xxxxxxx">
                <div id="validationServer05Feedback" class="invalid-feedback">
                  @error('pharmacy.phone') {{$message}} @enderror
                </div>
            </div> 
        </div>
          <div class="form-group col-md-4">
              <label for="inputAddress">موقع الصيدالية </label>
              <div class="input-group ">
                  <input type="text" name='address' wire:model.lazy='pharmacy.address' class="form-control @error('pharmacy.address') is-invalid @enderror "  placeholder="صيدلية الطبي - شارع الزاوية">
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('pharmacy.address') {{$message}} @enderror
                  </div>
              </div> 
          </div>
      </div>
      @if ($create)
        <button type="button" wire:click="store()" class="btn btn-success m-3 " @if (!($errors->any() || $submit)) disabled @endif>اضافة صيدالية</button>
      @else
        <button type="button" wire:click="update()" class="btn btn-primary m-3 " @if ($errors->any()) disabled @endif>تعديل صيدالية</button>
      @endif

    </div>
  </div>  
@else

<button type="button" wire:click="create()" class="btn btn-success m-3 ">اضافة صيدالية</button>

@endif

    <div class="row">

      <div class="col">
        @if(Session::has('done-message'))
          <div class="text-left">
            <span class="alert {{ Session::get('alert-class') }}" role="alert">
              {{ Session::get('done-message') }}
            </span> 
          </div> 
        @endif
          <!-- Card header -->
          <div class="card-header border-0 ">
            <h3 class="mb-0 text-center">الصيداليات المسجلة في النظام</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
             
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col" class="sort" data-sort="budget">تاريخ الانظمام</th>
                  <th scope="col" class="sort" data-sort="name">اسم الصيدالية</th>
                  <th scope="col" class="sort" data-sort="name">صورة</th>
                </tr>
              </thead>
              <tbody class="list">
                  @foreach ($pharmacies as $pharmacy)
                      
                  
                    <tr>

                     <td>
                        <span class="badge badge-dot">
                        
                        <button type="button" class="btn btn-primary" wire:click="edit({{$pharmacy->id}})">تعديل</button>
                        </span>
                    </td>
                     <td>
                        <span class="badge badge-dot">
                        
                        <button type="button" class="btn btn-danger "  wire:click="destroy({{$pharmacy->id}})">حدف</button>
                        </span>
                    </td>
                                   
                    <td class="budget">
                        {{$pharmacy->created_at->format('d-m-Y') }}
                    </td>
                    <td class="budget">
                      {{$pharmacy->name}}
                    </td>
                    <th scope="row">


                          <a href="#" class="avatar rounded-circle ">
                            <img alt="Image placeholder" class="" src="{{isset($pharmacy->user->image)?asset($pharmacy->user->image):'../assets/img/theme/bootstrap.jpg'}}">
                        </a>
                  </th>
                    
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $pharmacies->links() }}

        </div>
      </div>
    </div>
</div>
