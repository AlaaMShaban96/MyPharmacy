<?php

namespace App\Http\Resources\API\Advertising;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\Pharmacy\PharmacyResource;

class AdvertisingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
           'pharmacy' =>new PharmacyResource($this->pharmacy),
           'text'=>$this->text,
           'image'=>$this->image,
           'created_at'=>$this->created_at,
        ];
    }
}
