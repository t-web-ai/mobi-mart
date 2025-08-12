<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class OrderPolicy
{
    public function cancel(User $user, Order $order)
    {
        return $order->status == "pending" && $user->id == Auth::user()->id;
    }
}
