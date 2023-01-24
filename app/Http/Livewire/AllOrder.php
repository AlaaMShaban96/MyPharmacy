<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AllOrder extends Component
{
    public function render()
    {
        $orders=Order::where('status',true)->orderBy('id', 'DESC')->get();
        return view('livewire.all-order',compact('orders'));
    }
}
