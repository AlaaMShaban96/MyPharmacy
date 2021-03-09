<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;

class UserController extends Controller
{
    public function update(RegisterRequest $request,User $user)
    { 
        if (isset($request->password)) {
            $user->password=Hash::make($request->password);
        }
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->save();
        return response()->json(['message'=>'success edit user '], 200);
    }
}
