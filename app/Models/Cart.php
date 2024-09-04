<?php

namespace App\Models;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function products()
    {
        return $this->hasMany(CartItem::class);
    }

    // public function getTotalAttribute()
    // {
    //     return CartItem::where('cart_id', $this->id)->sum('price');
    // }
}
