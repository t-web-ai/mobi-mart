<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceVariantOrder extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceVariantOrderFactory> */
    use HasFactory;
    protected $fillable = [
        'order_id',
        'device_variant_id',
        'quantity',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function device_variant()
    {
        return $this->belongsTo(DeviceVariant::class);
    }
}
