<?php



use App\Models\User;
use App\Http\Livewire\Index;
use App\Http\Livewire\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Records;
use App\Http\Livewire\AllOrder;
use App\Http\Livewire\MyOrders;
use App\Events\SendNotification;
use App\Http\Livewire\AllRecord;
use App\Http\Livewire\Advertising;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\API\RegisterController;
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
Route::get('test', function () {
    // $client = new \GuzzleHttp\Client();
    //     $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
    //     'body' => '
    //     {
    //         "include_external_user_ids":["6"],
    //         "channel_for_external_user_ids": "push",
    //         "isAndroid": true,
    //         "contents":{
    //             "en":"test "
    //         }
    //         "name":"INTERNAL_CAMPAIGN_NAME","app_id":"dd2bc71c-72f2-4018-9e24-02039015dabf"
    //     }',
    //     'headers' => [
    //         'Authorization' => 'Basic YmM4Y2UxZjYtYmMwOC00MzE2LWE0NjgtODRiNDU4MjBlY2Q2',
    //         'accept' => 'application/json',
    //         'content-type' => 'application/json',
    //     ],
    //     ]);
    $client = new \GuzzleHttp\Client();
        $body=[
            "include_external_user_ids"=>["5"],
            "channel_for_external_user_ids"=>"push",
            "isAndroid"=>"true",
            "contents"=>[
                "en"=>"test test 2",
            ],
            "name"=>"INTERNAL_CAMPAIGN_NAME",
            "app_id"=>"dd2bc71c-72f2-4018-9e24-02039015dabf"
        ];
        // dd($lisOfIds,$body);
        $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications',
         [
            'body' =>json_encode($body),
            'headers' => [
                'Authorization' => 'Basic YmM4Y2UxZjYtYmMwOC00MzE2LWE0NjgtODRiNDU4MjBlY2Q2',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);
        dd($response);
});
Route::get('/', Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    
    Route::post('login/', [SystemController::class,'login']);
    Route::get('/dashboard', Index::class);
    Route::get('/my-oreders', MyOrders::class);
    Route::get('/records', Records::class);
    Route::get('/advertisings', Advertising::class);
    Route::get('/profile', Profile::class);
    Route::get('/all-order',AllOrder::class);
    Route::get('/all-record',AllRecord::class);
    Route::get('/logout', [RegisterController::class,'logout']);

});
