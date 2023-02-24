<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'name', 'text', 'status', 'user_id', 'public'];

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class, 'orders_pharmacies')->withPivot('id', 'price', 'text', 'status');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
