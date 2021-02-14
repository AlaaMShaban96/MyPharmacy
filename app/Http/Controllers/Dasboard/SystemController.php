<?php

namespace App\Http\Controllers\Dasboard;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    public function login(LoginRequest $request)
    {

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        Auth::guard()->logout();
        // auth()->attempt($loginData)
        //Attempt to log the admin in
        
        if (auth()->attempt($credential)) {

            return redirect('dashboard/');
            
        }else {

            return redirect()->back()->withErrors(['errors'=>'كلمة السر او البريد الالكتوني غير صحيح']);
        }

    }
}
