<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class MyOrders extends Component
{
    public $orders;
    public $order = ['price','text' ];
    public function render()
    {
        $this->orders=auth()->user()->pharmacy->orders()->whereHas('pharmacies', function($q) {
            $q->where('orders_pharmacies.status', 0);
        })->get();
   
        return view('livewire.my-orders',['orders'=>$this->orders]);
    }
    public function replayOrder(Order $order,$key)
    {
        // dd( $order);
    
       auth()->user()->pharmacy->orders()->updateExistingPivot($order->id,['price'=>$this->order[$key]['price'],'status'=>2]);
       
    }
}
