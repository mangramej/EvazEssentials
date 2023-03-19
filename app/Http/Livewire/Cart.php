<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Services\CartService;
use App\Services\OrderService;
use Livewire\Component;

class Cart extends Component
{
    public $payment_type;

    protected $rules = [
        'payment_type' => 'required|in:cod',
    ];

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
        if(! auth()->check() ) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $cart = session('cart');

        if(empty($cart)) {
            return;
        }

        $this->validate();

        if(! $user->hasAddress()) {
            session()->flash('alert', [
                'status' => 'warning',
                'message' => 'Set your address first.'
            ]);
            return redirect()->to('/profile');
        }

        OrderService::checkout($user, $cart, $this->payment_type);

        session()->flash('alert', [
            'status' => 'success',
            'message' => 'Thank you, your order has been placed.'
        ]);

        return redirect()->to('/');
    }

    public function render()
    {
        $cart = CartService::getContent();

        $total = CartService::getTotal();

        return view('livewire.cart', compact('cart', 'total'));
    }
}
