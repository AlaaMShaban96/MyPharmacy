<?php

namespace App\Http\Resources\API\Order;

use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
        return[
            'id'=>$this->id,
            'image'=>$this->image,
            'name'=>$this->name,
            'text'=>$this->text,
            'created_at'=>$this->created_at,
            'pharmacies'=>$this->pharmacies,


        ];
    }
}
