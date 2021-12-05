<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByAuth($query)
    {
        return $query->where('user_id', Auth()->id());
    }

    public function getImage()
    {
        return asset('images/'.$this->foto_tf);
    }
}
