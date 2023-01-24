
   <div class="main-content mt-8">
    
  

      <div class="container-fluid mt--6 text-center">
        <div class="row">
          <div class="col">
            <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">الطلبات</h3>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">الدواء</th>
                    <th scope="col" class="sort" data-sort="budget">شرح</th> 
                    <th scope="col" class="sort" data-sort="budget">نوع الطلب</th>    

                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($orders as $key=> $order)
                        
                  
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <button type="button"
                            class="btn btn-info show-order"
                            data-img-url="{{$order->image==""?asset('assets/img/logo.jpg'):$order->image}}"
                            data-name="{{$order->name}}"
                            data-text="{{$order->text}}"
                            data-toggle="modal" 
                            data-target="#exampleModal"
                           >عرض الطلب </button>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">{{$order->name}}</span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                        {{  mb_strimwidth($order->text, 0, 30, '...') }}
                      </td>
                      <td class="">
                        <h2>
                             <span class="badge {{ $order->public == true ? 'badge-success':'badge-danger' }}">
                            {{ $order->public == true ? "طلب عام ": "طلب خاص  " }}
                            </span>
                        </h2>

                        {{-- <h3 >
                            
                        </h3> --}}

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- {{$orders->links()}} --}}

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

<script>
  
</script>  


