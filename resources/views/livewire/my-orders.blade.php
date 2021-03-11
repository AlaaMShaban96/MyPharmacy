<div class="main-content">

    <div class="container-fluid text-center mt-6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">الطلبات المرسلة الي الصيدالية مباشرة</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">الدواء</th>
                    <th scope="col" class="sort" data-sort="budget">شرح</th>
                    <th scope="col" class="sort" data-sort="status">الحالة</th>
                    <th scope="col">المستخدم</th>
                    <th scope="col" class="sort" data-sort="completion">السعر</th>
                    <th scope="col" class="sort" data-sort="completion">الرد</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  {{-- <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">Argon Design System</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      $2500 USD
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                          <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                          <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                        </a>
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr> --}}
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
                      @csrf
                      <td>
                        <div class="avatar-group">
                        <input placeholder="سعر الدواء" wire:model.lazy='order.{{$key}}.price'  type="number" name="" id="" >
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group">
                        <input placeholder="كتابة الرد" wire:model.lazy='order.{{$key}}.text' maxlength="80" size="20"  type="text" name="" id="" >
                        </div>
                      </td>
                  
                      <td class="text-right">
                        <button type="submit" class="btn btn-primary ">رد علي الطلب</button>
                      </td>
                  </form>

                  </tr>
                  @endforeach
                  {{$orders->links()}}

                </tbody>

              </table>
            </div>
            <!-- Card footer -->
            {{-- <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
</div> 
