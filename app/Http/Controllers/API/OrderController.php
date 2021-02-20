<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Http\Resources\API\Order\OrdersResource;
use App\Http\Resources\API\Order\OrderFullDataResource;

class OrderController extends Controller
{
    public function index()
    {
        return new OrdersResource(Order::where('user_id',auth()->user()->id)->with('pharmacies')->get());
    }
    public function show(Order $order)
    {
        return new OrderFullDataResource($order);
    }
    public function create(OrderRequest $request)
    {
        $data=$request->all();
        $data['image']=$this->uploadeImages($request);
        $data['user_id']=auth()->user()->id;
        if (isset($data['pharmacy_id'])) {
           
            $order=Order::create($data);
            $pharmacy=Pharmacy::find($data['pharmacy_id']);
            $pharmacy->orders()->attach($order->id,['status'=>1]);
        }else {
            Order::create($data);
        }
        return response()->json(['response'=>'تم ارسال الطلب بنجاح'], 200);
    }
    private function uploadeImages( $request)
    {
        $imageName = time().time().".png";

        $path ="storage/". $request->file('image')->storeAs('order/image', $imageName, 'public');
       
        return $path;
    }
}
