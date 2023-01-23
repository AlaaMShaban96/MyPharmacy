<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
    public function destroy(Order $order)
    {
        try {
            DB::table('orders_pharmacies')->where('order_id',$order->id)->where('pharmacy_id',auth()->user()->pharmacy_id)->delete();
            $this->dispatchBrowserEvent('success-tost',['action'=>"الحذف"]);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('error-tost',['action'=>"الحذف"]);

        }
       
    }
}
