<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

use Livewire\WithPagination;


class MyOrders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $orders;
    public $order = ['price','text' ];
    public function render()
    {
        $this->orders=auth()->user()->pharmacy->orders()->whereHas('pharmacies', function($q) {
            $q->where('orders_pharmacies.status', 1);
        })->paginate(7);
   
        return view('livewire.my-orders',['orders'=>$this->orders]);
    }
    public function replayOrder(Order $order,$key)
    {
        
       auth()->user()->pharmacy->orders()->updateExistingPivot($order->id,['price'=>$this->order[$key]['price'],'text'=>$this->order[$key]['text'],'status'=>2]);
       
    }
}
