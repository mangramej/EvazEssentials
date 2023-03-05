<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'event-add-to-cart' => '$refresh'
    ];

    public function clearCart()
    {
        CartService::flush();
    }

    public function addQuantity(int $id)
    {
        CartService::addOne($id);
    }

    public function deducQuantity(int $id)
    {
        CartService::deducOne($id);
    }

    public function removeItem(int $id)
    {
        CartService::removeItem($id);
    }

    public function checkout()
    {
        if(! auth()->check()) {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $cart = CartService::getContent();

        $total = 0;
        foreach($cart as $item) {
            $total += ($item['quantity'] * $item['price']);
        }

        return view('livewire.cart', compact('cart', 'total'));
    }
}
