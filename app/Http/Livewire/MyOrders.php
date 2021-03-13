<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

use Livewire\WithPagination;


class MyOrders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    private  $orders;
    public $order = ['price','text' ];
    public function render()
    {
        if (auth()->user()->pharmacy->orders()->count() !=0) {
            $this->orders=auth()->user()->pharmacy->orders()->wherePivot('status',1)->paginate(7);
        }
   
        return view('livewire.my-orders',['orders'=>$this->orders]);
    }
    public function replayOrder(Order $order,$key)
    {
        
       auth()->user()->pharmacy->orders()->updateExistingPivot($order->id,['price'=>$this->order[$key]['price'],'text'=>$this->order[$key]['text'],'status'=>2]);
       
    }
}
