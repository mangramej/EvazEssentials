<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;

class OrderService
{
    static public function checkout(User $user, array $cart, string $payment)
    {
        Order::create([
            'user_id'           => $user->id,
            'status'            => 'pending',
            'payment_type'      => $payment,
            'total'             => CartService::getTotal(),
            'detail'            => serialize($cart),
            'customer_detail'   => serialize([
                'name'              => $user->name,
                'address_line_1'    => $user->address_line_1,
                'address_line_2'    => $user->address_line_2,
                'city'              => $user->city,
                'state'             => $user->state,
                'contact'           => $user->contact,
                'zip'               => $user->zip,
            ])
        ]);

        CartService::flush();
    }
}
