<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $user=['email'=>"",'password'=>""];
    protected $rules = [
        'user.email' => 'required',
        'user.password' => 'required|min:8',
    ];
    protected $messages = [
        'user.password.required' => 'يجب كتابة كلمة السر ', 
        'user.password.min' => 'يجب كتابة كلمة السر مكونة علي الاقل من 8 حروف', 
        'user.email.required'=>'يجب كتابة البريد الالكتروني',
        'user.email.email'=>'البريد الالكتروني غير موجود'
    ];

    public function render()
    { 
        return view('livewire.login')->layout('login');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    } 
    public function login()
    {
        // $this->validateOnly($propertyName);

        if (auth()->attempt($this->user)) {
           
                if (auth()->user()->status) {
                    return redirect('dashboard/');

                }else{

                    return redirect('admin/dashboard/');

                }
            
            
        }
    }
} 
