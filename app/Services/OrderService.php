<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;

class OrderService
{
    static public function checkout(User $user, array $cart, string $payment)
    {
        Order::create([
            'user_id'       => $user->id,
            'status'        => 'pending',
            'payment_type'  => $payment,
            'total'         => CartService::getTotal(),
            'detail'        => serialize($cart),
        ]);

        CartService::flush();
    }
}
