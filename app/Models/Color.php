<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /** @use HasFactory<\Database\Factories\ColorFactory> */
    use HasFactory;
    protected $fillable = ['name', 'code'];
    public function device_variants()
    {
        return $this->hasMany(DeviceVariant::class);
    }
}
