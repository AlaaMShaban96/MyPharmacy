<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard\Pharmacy\Index as Pharmacy;
use App\Http\Livewire\Dashboard\Index as Dashboard;
use App\Http\Livewire\Dashboard\User\Index as User;

Route::prefix('admin')->group(function () {
  Route::get('/dashboard', Dashboard::class);
  Route::get('/users', User::class);
  Route::get('/pharmacies', Pharmacy::class);
 
}); 

