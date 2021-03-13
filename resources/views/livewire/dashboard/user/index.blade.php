<div class="container-fluid mt-6 text-right">

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
                    <th scope="col" class="sort" data-sort="budget">تاريخ الانظمام</th>
                    <th scope="col" class="sort" data-sort="name">اسم المستخدم</th>
                    <th scope="col" class="sort" data-sort="name">صورة</th>
                    <th scope="col" class="sort" data-sort="name">رقم المستخدم</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($users as $user)
                                      
                      <tr>
                       <td>
                          <span class="badge badge-dot">
                          
                          <button type="button" class="btn btn-danger "  wire:click="destroy({{$user->id}})">حدف</button>
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
                            <a href="#" class="avatar rounded-circle ">
                                <img alt="Image placeholder" class="" src="{{isset($user->image)?asset($user->image):'../assets/img/theme/bootstrap.jpg'}}">
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
