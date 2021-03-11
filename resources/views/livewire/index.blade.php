
   <div class="main-content">
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <!-- Card stats -->
            <div class="row">
              
              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">الطلبات التي تم الرد عليها</h5>
                        <span class="h1 font-weight-bold mb-0">{{$myOrderNumber}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="ni ni-active-40"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                      
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">طلباتي</h5>
                        <span class="h1 font-weight-bold mb-0">{{auth()->user()->pharmacy->orders()->wherePivot('text',null)->count()}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="ni ni-chart-pie-35"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                      
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card card-stats">
                  <!-- Card body -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">تاريخ اليوم</h5>
                        <span class="h1 font-weight-bold mb-0">{{Carbon\Carbon::now()->format('d-m-Y')}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                          <i class="ni ni-watch-time"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">

                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger text-center" role="alert">
            <strong>خطاء!</strong> {{$error}}
          </div>
        @endforeach
      @endif  
      </div>
    <!-- Page content -->



  

      <div class="container-fluid mt--6 text-center">
        <div class="row">
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">الطلبات العامة</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">الدواء</th>
                      <th scope="col" class="sort" data-sort="budget">شرح</th>
                      <th scope="col" class="sort" data-sort="status">الحالة</th>
                      <th scope="col">المستخدم</th>
                      <th scope="col">السعر</th>
                      <th scope="col">الرد</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($orders->where('public',true) as $key=> $order)
                    @if ($order->pharmacies->where('id',auth()->user()->pharmacy->id)->count()==0)
                        
                  
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image " src="{{$order->image==""?asset('assets/img/logo.jpg'):$order->image}}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{$order->name}}</span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                        {{$order->text}}
                      </td>
                      <td>
                          <span class="badge badge-dot mr-4">
                              <i class="bg-success"></i>
                              <span class="status">طلب مفتوح</span>
                            </span>
                      </td>
                      <td>
                        <div class="avatar-group">
                          <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$order->user->name}}">
                            <img alt="Image placeholder" src="{{$order->user->image==""?'../assets/img/theme/team-1.jpg':$order->user->image}}">
                          </a>
                    
                        </div>
                      </td>
                      <form  wire:submit.prevent="replayOrder({{$order->id}},{{$key}})" method="post">
                      {{-- <form  wire:submit.prevent="replayOrder()" method="post"> --}}
                        @csrf
                        <td>
                          <div class="avatar-group">
                          <input placeholder="سعر الدواء" wire:model.lazy='order.{{$key}}.price' required  type="number" name="price" id="" >
                          </div>
                        </td>
                        <td>
                          <div class="avatar-group">
                          <input placeholder="كتابة الرد" wire:model.lazy='order.{{$key}}.text' maxlength="80" size="22"  type="text" name="text" id="" >
                          </div>
                        </td>
                    
                        <td class="text-right">
                          <button type="submit" class="btn btn-primary ">رد علي الطلب</button>
                        </td>
                    </form>
                    </tr>
                    @endif
                    @endforeach
                    {{$orders->links()}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div> 
    </div> 


   


