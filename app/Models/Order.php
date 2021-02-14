<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['image','name','text','status','user_id','pharmacy_id','price'];

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class,'orders_pharmacies')->withPivot('price','status');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
