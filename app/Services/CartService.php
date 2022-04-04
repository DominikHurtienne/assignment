<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CartService extends Model
{
    public function getOrCreateCart(User $user): Cart
    {
        $cart = Cart::where(['user_id' => $user->id])->first();
        if ($cart) {
            return $cart;
        }

        return Cart::create([
            'user_id' => $user->id,
        ]);

    }

    public function addProduct(Cart $cart, Product $product): void
    {
        $cartProduct = CartProduct::where(['cart_id' => $cart->id, 'product_id' => $product->id])->first();
        if (!$cartProduct) {
            CartProduct::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        } else {
            $cartProduct->quantity = $cartProduct->quantity + 1;
            $cartProduct->save();
        }
    }
}
