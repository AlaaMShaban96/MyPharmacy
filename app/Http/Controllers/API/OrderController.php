<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Order\OrdersResource;

class OrderController extends Controller
{
    public function index()
    {
        // dd(auth('api')->user()->id);
        return new OrdersResource(Order::where('user_id',auth()->user()->id)->with('pharmacies')->get());
    }
}
