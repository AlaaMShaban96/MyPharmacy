<?php

namespace App\Http\Controllers\API;

use App\Models\Advertising;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Advertising\AdvertisingCollection;

class AdvertisingController extends Controller
{
    public function index()
    {
        return new AdvertisingCollection(Advertising::all());
    }
}
