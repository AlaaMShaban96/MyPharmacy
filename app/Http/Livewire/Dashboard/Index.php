<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use App\Models\Pharmacy;

class Index extends Component
{
    public function render()
    {
        $users= User::all();
        $pharmacies=Pharmacy::all();
        $orders=Order::all();
        $orderCount=Order::whereHas('pharmacies', function ($q) {$q->where('status',2);})->count();
        
        return view('livewire.dashboard.index',['users'=>$users,'pharmacies'=>$pharmacies,'orders'=>$orders,'orderCount'=>$orderCount]);
    }
}
