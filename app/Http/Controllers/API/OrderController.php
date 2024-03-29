<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Http\Resources\API\Order\OrderFullDataResource;
use App\Http\Resources\API\Order\OrdersResource;
use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // dd((isset($request->status)?0:1),$request->status);
        return new OrdersResource(Order::where('user_id', auth()->user()->id)->where('status', isset($request->status) ? 0 : 1)->with('pharmacies')->get());
    }
    public function show(Order $order)
    {
        return new OrderFullDataResource($order);
    }
    public function create(OrderRequest $request)
    {
        try {
            $data = $request->all();
            $data['image'] = isset($data['image']) ? $this->uploadeImages($request) : null;
            $data['user_id'] = auth()->user()->id;
            if (isset($data['pharmacy_ids'])) {
                foreach ($data['pharmacy_ids'] as $pharmacy_id) {
                    $data['public'] = 0;
                    $order = Order::create($data);
                    $pharmacy = Pharmacy::find($pharmacy_id);
                    $pharmacy->orders()->attach($order->id, ['status' => 1]);
                }

            } else {
                Order::create($data);
            }
            return response()->json(['response' => 'تم ارسال الطلب بنجاح'], 200);
        } catch (\Throwable$th) {
            return $th;
        }
    }
    public function destroy(Order $order)
    {
        $order->status = 0;
        $order->delete();
        return response()->json(['response' => 'تم حذف الطلب بنجاح'], 200);
    }
    private function uploadeImages($request)
    {
        $imageName = time() . time() . ".png";

        $path = "storage/" . $request->file('image')->storeAs('order/image', $imageName, 'public');

        return $path;
    }
}
