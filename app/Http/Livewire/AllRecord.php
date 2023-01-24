<?php

namespace App\Http\Livewire;

use App\Models\Record;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AllRecord extends Component
{
    public function render()
    {
        $records=Record::with(['pharmacy','order'])->where('status','!=',1)->get();
        return view('livewire.all-record',compact('records'));
    }
}


