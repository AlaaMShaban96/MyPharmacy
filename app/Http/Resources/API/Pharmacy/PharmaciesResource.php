<?php

namespace App\Http\Resources\API\Pharmacy;

use App\Http\Resources\API\Pharmacy\PharmacyResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PharmaciesResource extends ResourceCollection
{
    public $collects = PharmacyResource::class;
    public static $wrap = '';

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
