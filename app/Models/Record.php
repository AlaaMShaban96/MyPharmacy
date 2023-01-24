<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;
    protected $table="orders_pharmacies";
    protected $fillable = ['price','status','text','pharmacy_id','order_id'];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
