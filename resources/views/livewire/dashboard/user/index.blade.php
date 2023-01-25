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
              <h3 class="mb-0 text-center">المستخدمين المسجلين  في النظام</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
               
                    <th scope="col"></th>
                    <th scope="col" class="sort" data-sort="budget">عدد الطلبات المرسلة</th>
                    <th scope="col" class="sort" data-sort="budget">تاريخ الانضمام</th>
                    <th scope="col" class="sort" data-sort="name">اسم المستخدم</th>
                    <th scope="col" class="sort" data-sort="name">الصورة</th>
                    <th scope="col" class="sort" data-sort="name">رقم المستخدم</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($users as $user)
                                      
                      <tr>
                       <td>
                          <span class="badge badge-dot">
                          
                          <button type="button" class="btn btn-danger "  wire:click="destroy({{$user->id}})">حذف</button>
                          </span>
                      </td>           
                      <td class="budget">
                          {{$user->orders->count()}}
                      </td>
                      <td class="budget">
                          {{$user->created_at->format('d-m-Y') }}
                      </td>
                      <td class="budget">
                        {{$user->name}}
                      </td>
                        <th scope="row">
                            <a href="#" class="avatar ">
                                <img alt="Image placeholder" style="height: 100%;"class="" src="{{isset($user->image)?asset($user->image):'../assets/img/theme/bootstrap.jpg'}}">
                            </a>
                        </th>
                        <th scope="row">
                               {{$user->id}}
                        </th>
                      
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $users->links() }}
           
          </div>
        </div>

</div>
