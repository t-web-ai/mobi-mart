<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'category_id',
        'name',
        'description',
        'network',
        'release_date',
        'dimensions',
        'weight',
        'build',
        'sim',
        'screen_type',
        'screen_size',
        'resolution',
        'os',
        'chipset',
        'cpu',
        'gpu',
        'card_slot',
        'main_camera',
        'selfie_camera',
        'jack',
        'wlan',
        'bluetooth',
        'positioning',
        'nfc',
        'radio',
        'usb',
        'sensors',
        'battery',
        'charging'
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function device_variants()
    {
        return $this->hasMany(DeviceVariant::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
