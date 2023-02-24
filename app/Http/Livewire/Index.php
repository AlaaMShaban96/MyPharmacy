<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Events\SendNotification;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $myOrderNumber,$allOrdersNumber;
    public $order = ['price','text' ];
    public Order $x;
 
   
    public function render()
    {
        $myOrderIds=auth()->user()->pharmacy->orders()->pluck('order_id');
        $this->myOrderNumber=(auth()->user()->pharmacy->orders->count()!=0)?auth()->user()->pharmacy->orders()->wherePivot('status',2)->count():0;
        $orders=Order::whereNotIn('id', $myOrderIds)->where('status',true)->where('public',true)->orderBy('id', 'DESC')->get();
        $this->allOrdersNumber=$orders->count();
        return view('livewire.index',compact('orders'));
    }


   public function replayOrder(Order $order,$key)
   {
      auth()
      ->user()
      ->pharmacy
      ->orders()
      ->attach($order->id,[
        'price'=>$this->order[$key]['price'],
        'text'=>$this->order[$key]['text'],
        'status'=>2
        ]);
        $notification="تم الرد على الطلب من قبل ".auth()->user()->pharmacy->name;
        event(new SendNotification($order->user,$notification));
        $this->dispatchBrowserEvent('success-tost',['action'=>"الرد على الطلب "]);
      $this->myOrderNumber+1;  
      $this->order[$key]['price']="";
      $this->order[$key]['text']="";
   }
  public function x(Order $order)
  {
    $this->x=$order;
  }

}
