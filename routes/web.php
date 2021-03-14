<?php



use App\Http\Livewire\Index;
use App\Http\Livewire\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Records;
use App\Http\Livewire\MyOrders;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dasboard\SystemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('login/', [SystemController::class,'login']);
    Route::get('/dashboard', Index::class);
    Route::get('/my-oreders', MyOrders::class);
    Route::get('/records', Records::class);
    Route::get('/profile', Profile::class);
});
