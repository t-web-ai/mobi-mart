<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceVariantImage extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceVariantImageFactory> */
    use HasFactory;
    protected $fillable = [
        'device_variant_id',
        'image_path',
        'is_main'
    ];
    public function device_variant()
    {
        return $this->belongsTo(DeviceVariant::class);
    }
}
