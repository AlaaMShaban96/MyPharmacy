<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id'];

    public function orders()
    {
        return $this->belongsToMany(Order::class,'orders_pharmacies')->withPivot('price','status');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
