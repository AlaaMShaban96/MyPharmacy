<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;

class Index extends Component
{
    public $myOrderNumber,$allOrdersNumber;
    public $order = ['price','text' ];
 
   
    public function render()
    {
        
        $this->myOrderNumber=auth()->user()->pharmacy->orders->count();
        $orders=Order::where('status',true)->orderBy('id', 'DESC')->get();
        $this->allOrdersNumber=$orders->count();
        return view('livewire.index',['orders'=>$orders]);
    }


   public function replayOrder(Order $order,$key)
   {
   
      auth()->user()->pharmacy->orders()->attach($order->id,['price'=>$this->order[$key]['price'],'text'=>$this->order[$key]['text'],'status'=>2]);
      $this->myOrderNumber+1;
      
   }
}
