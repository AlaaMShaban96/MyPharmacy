<?php

namespace App\Http\Resources\API\Advertising;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\API\Advertising\AdvertisingResource;

class AdvertisingCollection extends ResourceCollection
{
    public $collects = AdvertisingResource::class;
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
