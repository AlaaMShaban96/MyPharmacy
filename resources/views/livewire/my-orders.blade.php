<div class="main-content">

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
                  <form  wire:submit.prevent="replayOrder({{$order->id}},{{$key}})" method="post">
                    @csrf
                    <td>
                      <div class="avatar-group">
                      <input placeholder="سعر الدواء" wire:model.lazy='order.{{$key}}.price' required  type="number" name="price" id="" >
                      </div>
                    </td>
                    <td>
                      <div >
                      <textarea placeholder="كتابة الرد" wire:model.lazy='order.{{$key}}.text' rows="1"    name="text" id="" >
                      </textarea>
                      </div>
                    </td>
                
                    <td class="text-right">
                      <button type="submit" class="btn btn-primary ">رد على الطلب</button>
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
