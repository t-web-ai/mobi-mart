<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_price',
        'shipping_address',
        'payment',
        'status'
    ];
    public function device_variants()
    {
        return $this->belongsToMany(DeviceVariant::class, DeviceVariantOrder::class);
    }
    public function device_variant_orders()
    {
        return $this->hasMany(DeviceVariantOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
