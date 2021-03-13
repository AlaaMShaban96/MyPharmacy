<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination ;
    public function render()
    {
        $users=User::where('status',1)->where('pharmacy_id',null)->paginate(10);
        // dd($users[0]->orders->count());
        return view('livewire.dashboard.user.index',compact('users'));
    }
} 
