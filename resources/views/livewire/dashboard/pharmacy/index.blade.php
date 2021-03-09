<div class="container-fluid mt-6 text-right">

  <div class="card ">
    <div class="bg-white p-3 mb-3 text-center">
      <h3>معلومات الصيدالية</h3>
      <br>
      <div class="form-row ">
          <div class="form-group col-md-4">
              <label for="inputPassword4">كلمة السر</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <input type="password" class="form-control" value='' name='password' id="inlineFormInputGroup" placeholder="Ac@+_hgkjd *****Udg" required>
                  <div class="input-group-addon"></div>
              </div> 
          </div>
          <div class="form-group col-md-4">
              <label for="inputPassword4">البريد الالكتروني</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <input type="email" class="form-control" value='' name='email' id="inlineFormInputGroup" placeholder="البريد الالكتروني" required>
                  <div class="input-group-addon"></div>
              </div> 
          </div>
          <div class="form-group col-md-4">
              <label for="inputPassword4">اسم الصيدالية</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <input type="text" class="form-control" value='' name='name' id="inlineFormInputGroup" placeholder="اسم الصيدالية" required>
                  <div class="input-group-addon"></div>
              </div> 
          </div>
  
      </div>
      <div class="form-row ">
          <div class="form-group col-md-2">
              <label for="inputAddress">احداتيات ( Y )</label>
              <div class="input-group ">
                  <input type="text" name='mc_api' value='' class="form-control" id="inlineFormInputGroup" placeholder="MC API">
                  <div class="input-group-addon"></div>
              </div> 
          </div>
          <div class="form-group col-md-2">
              <label for="inputAddress">احداتيات ( X )</label>
              <div class="input-group ">
                  <input type="text" name='admin_email' value='' class="form-control" id="inlineFormInputGroup" placeholder="Admin Gmail">
                  <div class="input-group-addon"></div>
              </div> 
          </div>
          <div class="form-group col-md-8">
              <label for="inputAddress">موقع الصيدالية </label>
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
  </div>


  <button type="button" class="btn btn-success m-3 ">اضافة صيدالية</button>

    <div class="row">

      <div class="col">
      
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
                        
                        <button type="button" class="btn btn-warning "  wire:click="destroy({{$pharmacy->id}})">حدف</button>
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
                            <img alt="Image placeholder" class="" src="../assets/img/theme/bootstrap.jpg">
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
