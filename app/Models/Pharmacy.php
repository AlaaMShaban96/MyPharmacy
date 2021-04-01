<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{ 
    use HasFactory;
    protected $fillable = ['name','x','y','user_id','address'];

    public function orders()
    {
        return $this->belongsToMany(Order::class,'orders_pharmacies')->withPivot('price','text','status');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the Advertising for the Pharmacy
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function advertisings()
    {
        return $this->hasMany(Advertising::class);
    }
}
