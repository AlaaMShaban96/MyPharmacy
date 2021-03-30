<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;
    protected $fillable = ['text','image','pharmacy_id'];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }
}
