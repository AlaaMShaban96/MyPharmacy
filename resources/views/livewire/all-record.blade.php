<div class="main-content mt-8">

    <div class="container-fluid text-center mt-6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">الطلبات التي تم الردعلىها  </h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">الدواء</th>
                    <th scope="col" class="sort" data-sort="budget">شرح</th>
                    <th scope="col" class="sort" data-sort="budget">صيدالية</th>
                    <th scope="col" class="sort" data-sort="completion">السعر</th>
                    <th scope="col" class="sort" data-sort="completion">الرد</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach ($records as $key => $record) 
                                         
                  <tr>
                    <th scope="row">
                      
                      <div class="media align-items-center">
                        <button type="button"
                            class="btn btn-info show-order"
                            data-img-url="{{$record->order->image==""?asset('assets/img/logo.jpg'):$record->order->image}}"
                            data-name="{{ $record->order->name}}"
                            data-text="{{ $record->order->text}}"
                            data-toggle="modal" 
                            data-target="#exampleModal"
                           >عرض الطلب </button>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ $record->order->name}}</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      {{  mb_strimwidth($record->order->text, 0, 30, '...') }}
                    </td>
                    <td class="budget">
                        {{  $record->pharmacy->name}}
                      </td>
                      <td>
                        <div class="avatar-group">
                            <span class="name mb-0 text-sm">{{$record->price}}</span> 
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group">
                            <span class="name mb-0 text-sm">{{$record->text}}</span> 
                        </div>
                      </td>
                  
                  
                  </tr>
                  @endforeach

                </tbody>
              </table>
              {{-- {{ $orders->links() }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
</div> 


<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="order-name">بيانات الطلب</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img src="" alt="" srcset="" id="order-img-url" style="width: 100%;height: 60%;">
          <div class="form-group">
            <label for="message-text" class="col-form-label"> تفاصيل الطلب:</label>
            {{-- <textarea disabled class="form-control" id="order-text"></textarea> --}}
            <p id="order-text"></p>
          </div>
      </div>
    </div>
  </div>
</div>