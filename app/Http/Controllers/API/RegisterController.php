<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\API\User\UserResourc;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $request['password'] = Hash::make($request->password);
            if (isset( $request->photo)) {
                $request['image']=$this->uploadeImages( $request);
            } 
            $user = User::create($request->all());
            return new UserResourc($user);
        } catch (\Throwable $th) {
            return$th;
        }
       
    }
    public function login(LoginRequest $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        return new UserResourc(auth()->user());
        //  response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }
    public function logout()
    {
        Auth::guard()->logout();
        return redirect('/');
    }
    private function uploadeImages( $request)
    {
        $imageName = time().time().".png";

        $path ="storage/". $request->file('photo')->storeAs('user/image', $imageName, 'public');
       
        return $path;
    }
}
