<?php

namespace App\Policies;

use App\Models\DeviceVariant;
use App\Models\User;

class DeviceVariantPolicy
{
    /**
     * Create a new policy instance.
     */
    public function cart(?User $user, DeviceVariant $product)
    {
        return $product->stock > 0;
    }
    public function order(?User $user, DeviceVariant $deviceVariant)
    {
        return $deviceVariant->stock > 0;
    }
    public function orderAction(User $user, DeviceVariant $deviceVariant, int $number)
    {
        return $deviceVariant->stock >= $number;
    }
}
