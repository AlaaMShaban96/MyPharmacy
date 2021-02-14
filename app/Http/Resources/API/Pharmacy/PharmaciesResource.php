<?php

namespace App\Http\Resources\API\Pharmacy;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PharmaciesResource extends ResourceCollection
{
    public $collects = 'App\Http\Resources\API\Pharmacy\PharmacyResource';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
