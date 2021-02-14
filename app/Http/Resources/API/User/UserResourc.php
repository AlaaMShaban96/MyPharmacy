<?php

namespace App\Http\Resources\API\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResourc extends JsonResource
{
    public static $wrap = '';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'image'=>$this->image,
            'token'=>$this->createToken('authToken')->accessToken,
        ];
    }
}
