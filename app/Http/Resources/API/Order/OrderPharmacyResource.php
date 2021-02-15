<?php

namespace App\Http\Resources\API\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderPharmacyResource extends JsonResource
{
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
            'id'=>$this->id,
            'name'=>$this->name,
        ];
    }
}
