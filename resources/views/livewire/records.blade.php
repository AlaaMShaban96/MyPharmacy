<div class="main-content">

    <div class="container-fluid text-center mt-6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">الطلبات التي تم الرد عليها </h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">الدواء</th>
                    <th scope="col" class="sort" data-sort="budget">شرح</th>
                    {{-- <th scope="col" class="sort" data-sort="status">الحالة</th> --}}
                    <th scope="col">المستخدم</th>
                    <th scope="col" class="sort" data-sort="completion">السعر</th>
                    <th scope="col" class="sort" data-sort="completion">الرد</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach ($orders as $key => $order) 
                                         
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
                    {{-- <td>
                        <span class="badge badge-dot mr-4">
                            <i class="bg-success"></i>
                            <span class="status">طلب مفتوح</span>
                          </span>
                    </td> --}}
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$order->user->name}}">
                          <img alt="Image placeholder" src="{{$order->user->image==""?'../assets/img/theme/team-1.jpg':$order->user->image}}">
                        </a>
                  
                      </div>
                    </td>
                      <td>
                        <div class="avatar-group">
                            <span class="name mb-0 text-sm">{{$order->pivot->price}}</span> 
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group">
                            <span class="name mb-0 text-sm">{{$order->pivot->text}}</span> 
                        </div>
                      </td>
                  
                  
                  </tr>
                  @endforeach

                </tbody>
              </table>
              {{ $orders->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
</div> 
