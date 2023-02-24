<?php

namespace App\Http\Livewire;

use App\Events\SendNotification;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class MyOrders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    private $orders;
    public $order = ['price', 'text'];
    public function render()
    {
        $this->orders = auth()
            ->user()
            ->pharmacy
            ->orders()
            ->where('public', 0)
            ->orderBy('id', 'DESC')
            ->wherePivot('status', 1)
            ->get();

        return view('livewire.my-orders', ['orders' => $this->orders]);
    }
    public function replayOrder(Order $order, $key)
    {

        auth()
            ->user()
            ->pharmacy
            ->orders()
            ->updateExistingPivot($order->id, [
                'price' => $this->order[$key]['price'],
                'text' => $this->order[$key]['text'],
                'status' => 2,
            ]);
        $notification = "تم الرد على الطلب من قبل " . auth()->user()->pharmacy->name;
        event(new SendNotification($order->user, $notification));
        $this->dispatchBrowserEvent('success-tost', ['action' => "الرد على الطلب "]);
    }
}
