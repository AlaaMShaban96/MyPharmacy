<div class="container-fluid mt-6 text-right">
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

  @if ($create || $edit)
    
       
    <div class="card ">
    
      <div class="bg-white p-3 mb-3 text-center">
        <div class=" text-left">
            <button type="button" class="btn btn-warning "  wire:click="closeForm()">الغاء</button>
        </div>
  
        <h3>معلومات الاعلان</h3>
  
        <br>
        
        <div class="form-row ">
            <div class="form-group col-md-6">
                <label for="inputAddress">الصورة</label>
                <div class="input-group">
                  <input type="file" class="form-control  text-right @error('advertising.photo') is-invalid @enderror" wire:model.defer='advertising.photo'  aria-label="Upload">
                  <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('advertising.photo') {{$message}} @enderror
                  </div>
                </div>
            </div>
           
            <div class="form-group col-md-6">
                <label for="inputAddress">النص </label>
                <div class="input-group ">
                    <input type="text" name='text' wire:model.defer='advertising.text' class="form-control  text-right @error('advertising.text') is-invalid @enderror"  placeholder="إضافة نص الاعلان">
                    <div id="validationServer05Feedback" class="invalid-feedback">
                      @error('pharmacy.y') {{$message}} @enderror
                    </div>
                </div> 
            </div>
        </div>
        @if ($create)
          <button type="button" wire:click="store()" class="btn btn-success m-3 " @if (!($errors->any() || $submit)) disabled @endif>إضافة اعلان</button>
        @else
          <button type="button" wire:click="update()" class="btn btn-primary m-3 " @if (!($errors->any() || $submit)) disabled @endif>تعديل اعلان</button>
        @endif
  
      </div>
    </div>  
  @else
  
  <button type="button" wire:click="create()" class="btn btn-success m-3 ">إضافةاعلان</button>
  
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
              <h3 class="mb-0 text-center">الاعلانات</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
               
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="sort" data-sort="budget">تاريخ الاعلان</th>
                    <th scope="col" class="sort" data-sort="name">النص</th>
                    <th scope="col" class="sort" data-sort="name">الصورة</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($advertisings as $advertising)
                            <tr>
  
                              <td>
                                <span class="badge badge-dot">
                                
                                <button type="button" wire:click="edit({{$advertising->id}})"  class="btn btn-primary" >تعديل</button>
                                </span>
                              </td>
                              <td>
                                <span class="badge badge-dot">
                                
                                <button type="button" wire:click="destroy({{$advertising->id}})" class="btn btn-danger " >حذف</button>
                                </span>
                              </td>
                                          
                              <td class="budget">
                                {{$advertising->created_at->format('d-m-Y') }}
                              </td>
                              <td class="budget">
                              {{$advertising->text}}
                            </td>
                              <th scope="row">
        
                                <button type="button"
                                  class="btn btn-info show-img-url"
                                  data-img-url="{{isset($advertising->image)?asset($advertising->image):'../assets/img/theme/bootstrap.jpg'}}"
                                  data-date="{{$advertising->created_at->format('d-m-Y') }}"
                                  data-text="{{$advertising->text}}"
                                  data-toggle="modal" 
                                  data-target="#adModal"
                                >عرض الاعلان </button>
                              </th>
                            
                            </tr>                    
                    
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- {{ $advertisings->links() }} --}}
           
          </div>
        </div>
      </div>
  </div>
 

  <div class="modal fade " id="adModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ad-date">بيانات الطلب</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <img src="" alt="" srcset="" id="ad-img-url" style="width: 100%;height: 60%;">
            <div class="form-group">
              <label for="message-text" class="col-form-label"> تفاصيل الاعلان:</label>
              <p id="ad-textt"></p>
            </div>
        </div>
      </div>
    </div>
  </div>