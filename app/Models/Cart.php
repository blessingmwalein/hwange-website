<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItems::class);
    }

    //get cart total
    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->cartItems as $item) {
            $total += $item->product->getMainPrice()->price * $item->quantity;
        }
        return $total;
    }
}
