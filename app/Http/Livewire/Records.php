<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Records extends Component
{       public $orders;


    public function render()
    {
        $this->orders=auth()->user()->pharmacy->orders()->whereHas('pharmacies', function($q) {
                    $q->where('orders_pharmacies.status', 2);
                })->get();
        //    dd($this->orders);
        return view('livewire.records',['orders'=>$this->orders]);
    }
}
