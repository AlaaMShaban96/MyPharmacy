<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AllRecord extends Component
{
    public function render()
    {
        $x=DB::table('orders_pharmacies')->get();
        dd($x);
        return view('livewire.all-record');
    }
}
