<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class AddToCart extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addItem()
    {
        CartService::addItem($this->product);

        $this->emit('event-add-to-cart');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
