<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Welcome extends Component
{
    use WithPagination;
    public   $orders ;
    // public   $users ;
    public   $user= [
                'name'=>"",
                'password'=>"",
                'email'=>"",
                'phone'=>"",
            ] ;

    protected $rules = [
        'user.name' => 'required',
        'user.password' => 'required',
        'user.email' => 'required',
        'user.phone' => 'required',
    ];
    public function render()
    {
        return view('livewire.welcome',['users'=>User::paginate(2)]);
    }
    public function mount()
    {
    //    $this->users=User::paginate(2);
    }
    public function clear()
    {
        // dd('here');
        $this->orders="";

    } 
    public function updated($propertyName)
    {
        // dd($propertyName);
        $this->validateOnly($propertyName);
    }   
    public function saveUser()
    {
        $validatedData = $this->validate();
        $newUser =User::create($this->user);
        // $this->users->push($newUser);
      
    }
    public function delete(User $user)
    {
        $user->delete();
        // $this->users=$this->users->where('id','!=',$user->id);
        // return redirect()->to('/login');
        // dd($user);
    }
}
