<?php



use App\Http\Livewire\Login;
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

Route::get('/', function () {
    return view('welcome2');
});
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('dashboard/', [DashboardController::class,'index']);
Route::post('login/', [SystemController::class,'login'])->name('login');
Route::get('/login', Login::class);
Route::get('/dashboard', App\Http\Livewire\Index::class);
Route::get('/my-oreders', MyOrders::class);