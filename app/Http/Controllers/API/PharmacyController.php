<?php

namespace App\Http\Controllers\API;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Pharmacy\PharmaciesResource;

class PharmacyController extends Controller
{
    public function index()
    {
       $pharmacies= Pharmacy::whereHas('user', function($q){
            $q->where('status', '!=', 3);
        })->get();
        
        return new PharmaciesResource($pharmacies);
    }
} 
