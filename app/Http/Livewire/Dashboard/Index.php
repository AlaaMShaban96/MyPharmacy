<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
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
        $months=Order::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
            // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
        // dd($ss);
        return view('livewire.dashboard.index',compact('users','pharmacies','orders','orderCount','months'));
    }
}
