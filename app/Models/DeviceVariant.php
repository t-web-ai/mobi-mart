<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceVariant extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceVariantFactory> */
    use HasFactory;
    protected $fillable = [
        'device_id',
        'color_id',
        'ram',
        'storage',
        'price',
        'discount',
        'stock'
    ];
    public function device_variant_images()
    {
        return $this->hasMany(DeviceVariantImage::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, DeviceVariantOrder::class);
    }
}
