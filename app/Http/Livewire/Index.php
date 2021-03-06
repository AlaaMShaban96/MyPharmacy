<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $myOrderNumber,$allOrdersNumber;
    public $order = ['price','text' ];
 
   
    public function render()
    {
        $this->myOrderNumber=(auth()->user()->pharmacy->orders->count()!=0)?auth()->user()->pharmacy->orders()->wherePivot('status',2)->count():0;
        $orders=Order::where('status',true)->orderBy('id', 'DESC')->paginate(7);
        $this->allOrdersNumber=$orders->count();
        return view('livewire.index',compact('orders'));
    }


   public function replayOrder(Order $order,$key)
   {
   
      auth()->user()->pharmacy->orders()->attach($order->id,['price'=>$this->order[$key]['price'],'text'=>$this->order[$key]['text'],'status'=>2]);
      $this->myOrderNumber+1;
      
   }
}
