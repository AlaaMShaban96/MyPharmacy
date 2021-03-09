<div class="container-fluid mt-6 text-right">
  <button type="button" class="btn btn-success m-3 ">حدف</button>

    <div class="row">

      <div class="col">
        <div class="card ">
          <div class="bg-white p-3 mb-3 text-center">
            <h3>معلومات المتجر</h3>
            <br>
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">اسم المتجر</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" class="form-control" value='' name='name' id="inlineFormInputGroup" placeholder="اسم المتجر" required>
                        <div class="input-group-addon"></div>
                    </div> 
                </div>
                    <div class="form-group col-md-6">
                        <h5>نوع الاشتراك</h5>
                        <br>
                        <label for=""> سنة</label>
                        <input type="radio" class="mr-5" id="renew1" name="renew" value="12" required>
                        <label for="">تلاتة شهور</label>
                        <input type="radio" class="mr-5" id="renew1" name="renew" value="3" required>
                        <label for="">شهر</label>
                        <input type="radio" class="mr-5" id="renew1" name="renew" value="1" required>
                    </div>  
            </div>
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <label for="inputAddress">MC API</label>
                    <div class="input-group ">
                        <input type="text" name='mc_api' value='' class="form-control" id="inlineFormInputGroup" placeholder="MC API">
                        <div class="input-group-addon"></div>
                    </div> 
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">البريد الاكتروني الخاص بمدير المتجر</label>
                    <div class="input-group ">
                        <input type="text" name='admin_email' value='' class="form-control" id="inlineFormInputGroup" placeholder="Admin Gmail">
                        <div class="input-group-addon"></div>
                    </div> 
                </div>
            </div>
            <div class="form-group col-md-4">
                <img id="blah"  onclick='selectImage()' src=''  width="100" height="100" />
                    <div class="custom-file" style="display: none;">
                        <input name='icon'  onchange="ValidateSize(this);document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name='main_imageValue' type="file" class="custom-file-input" id="validatedCustomFile" >
                    </div>
                    <label for="inputAddress" class='ml-5'>صورة الشعار</label>
            </div>
        </div>
          <!-- Card header -->
          <div class="card-header border-0 ">
            <h3 class="mb-0 text-center">الصيداليات المسجلة في النظام</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">اسم الصيدالية</th>
                  <th scope="col" class="sort" data-sort="budget">تاريخ الانظمام</th>
                  <th scope="col" class="sort" data-sort="status"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="list">
                  @foreach ($pharmacies as $pharmacy)
                      
                  
                    <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                            <span class="name mb-0 text-sm">{{$pharmacy->name}}</span>
                        </div>
                        </div>
                    </th>
                   <td class="budget">
                       {{$pharmacy->created_at->format('d-m-Y') }}
                    </td>
                     <td>
                        <span class="badge badge-dot">
                        
                        <button type="button" class="btn btn-primary" wire:click="edit({{$pharmacy->id}})">تعديل</button>
                        </span>
                    </td>
                     <td>
                        <span class="badge badge-dot">
                        
                        <button type="button" class="btn btn-warning "  wire:click="destroy({{$pharmacy->id}})">حدف</button>
                        </span>
                    </td>
                    
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
