<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $orders=Order::where('status',true)->orderBy('id', 'DESC')->paginate(5);
        return view('dashboard/index');
    }
}
