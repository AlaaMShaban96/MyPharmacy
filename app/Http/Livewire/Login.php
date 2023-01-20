<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $user=['email'=>"",'password'=>""];
    protected $rules = [
        'user.email' => 'required',
        'user.password' => 'required|min:8',
    ];
    protected $messages = [
        'user.password.required' => 'يجب كتابة كلمة السر ', 
        'user.password.min' => 'يجب كتابة كلمة السر مكونة على الاقل من 8 حروف', 
        'user.email.required'=>'يجب كتابة البريد الالكتروني',
        'user.email.email'=>'البريد الالكتروني غير موجود'
    ];

    public function render()
    { 
        return view('livewire.login')->layout('login');
    }
    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // } 
    public function login()
    {
        $this->user=  $this->validate([
            'user.email' => 'required',
            'user.password' => 'required|min:8',
        ]);
        if (User::query()->where('email',$this->user['user']['email'])->where('status','!=',3)->exists()) {
           if (auth()->attempt($this->user['user'])) {
                if (auth()->user()->status) {
                    return redirect('dashboard/');

                }else{
 
                    return redirect('admin/dashboard');
                }
            }else{

                Session::flash('done-message', 'كلمة السر او البريد اﻹلكتروني غير صحيح'); 
                Session::flash('alert-class', 'alert-danger');
            }
            
        }else{
            Session::flash('done-message', ' حساب المستخدم غير مفعل او غير موجود'); 
            Session::flash('alert-class', 'alert-danger');
        }
    }
} 
