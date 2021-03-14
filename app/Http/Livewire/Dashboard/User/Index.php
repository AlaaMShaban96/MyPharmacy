<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use WithPagination ;
    public function render()
    {
        $users=User::where('status',1)->where('pharmacy_id',null)->paginate(10);
        return view('livewire.dashboard.user.index',compact('users'));
    }
    public function destroy(User $user)
    {
        try {
            $user->status=3;
            $user->save();

            Session::flash('done-message', ' تم الحذف بنجاح'); 
            Session::flash('alert-class', 'alert-success'); 

        } catch (\Throwable $th) {
           
            Session::flash('done-message', 'فشلة عملية الحذف'); 
            Session::flash('alert-class', 'alert-danger');
        }
       
    }
} 
