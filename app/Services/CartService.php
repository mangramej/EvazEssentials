<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartService
{
    static private function init()
    {
        if(! session()->has('cart')) {
            session()->put('cart', []);
        }
    }

    static public function syncCartSessionAndDatabase(User $user)
    {
        self::init();

        $cart = session('cart');

        if($user->cart) {
            $cartDB = unserialize($user->cart->data);

            foreach($cartDB as $item) {
                if(in_array($item['product-id'], array_column($cart, 'product-id'))) {
                    continue;
                }

                $cart[] = $item;
            }
        }

        session()->put('cart', $cart);
    }

    static public function flush()
    {
        session()->forget('cart');

        Cart::where('user_id', Auth::id())
                ->update(['data' => serialize([])]);

        session(['cart' => []]);
    }

    static public function addItem(Product $product)
    {
        self::init();

        $cart = session('cart');

        if(in_array($product->id, array_column($cart, 'product-id'))) {
            return;
        }

        $image = Product::with('previewImages')
                ->find($product->id)->previewImages->path;


        $cart[] = [
            'product-id'    => $product->id,
            'name'          => $product->name,
            'price'         => $product->price,
            'quantity'      => 1,
            'image'         => $image,
        ];

        session(['cart' => $cart]);
    }

    static public function addOne(int $id)
    {
        self::init();

        $cart = session('cart');

        if(in_array($id, array_column($cart, 'product-id'))) {
            $key = array_search($id, array_column($cart, 'product-id'));

            $cart[$key]['quantity'] += 1;

            session(['cart' => $cart]);
        }
    }

    static public function deducOne(int $id)
    {
        self::init();

        $cart = session('cart');

        if(in_array($id, array_column($cart, 'product-id'))) {
            $key = array_search($id, array_column($cart, 'product-id'));

            if($cart[$key]['quantity'] < 1) {
                return;
            }

            $cart[$key]['quantity'] -= 1;

            session(['cart' => $cart]);
        }
    }

    static public function updateItem(Product $product, int $quantity)
    {
        self::init();

        $cart = session('cart');

        if(in_array($product->id, array_column($cart, 'product-id'))) {
            $key = array_search($product->id, array_column($cart, 'product-id'));

            $cart[$key]['quantity'] = $quantity;

            session(['cart' => $cart]);
        }
    }

    static public function removeItem(int $id)
    {
        self::init();

        $cart = session('cart');

        if(in_array($id, array_column($cart, 'product-id'))) {
            $key = array_search($id, array_column($cart, 'product-id'));

            unset($cart[$key]);
        }

        session(['cart' => $cart]);
    }

    static public function save(User $user)
    {
        self::init();

        if($user) {
            Cart::updateOrCreate(
                ['user_id'  => $user->id],
                ['data'     => serialize(session('cart') ?? [])]
            );
        }
    }

    static public function getContent()
    {
        self::init();

        return session('cart');
    }

    static public function getTotal()
    {
        self::init();

        $cart = session('cart');

        if(empty($cart)) {
            return 0;
        }

        $total = 0;

        foreach($cart as $item) {
            $total += ($item['quantity'] * $item['price']);
        }

        return $total;
    }
}
