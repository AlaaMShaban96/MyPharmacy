<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\SendOTPUsingEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
    public function sendOTPUsingEmail(Request $request)
    {
        try {
            //The email sending is done using the to method on the Mail facade
            Mail::to( $request->email)->send(new SendOTPUsingEmail( $request->code));
            return response()->json(['message'=>'Send OTP Using Email Successfully'], 200);

        } catch (\Throwable $th) {
            return response(['message' => 'Invalid Credentials'. $th]);

        }
        

    }
    private function uploadeImages( $request)
    {
        $imageName = time().time().".png";

        $path ="storage/". $request->file('photo')->storeAs('user/image', $imageName, 'public');
       
        return $path;
    }
}
