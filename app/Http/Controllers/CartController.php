<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Services\CartService;

class CartController
{
    /** @var CartService */
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function add(User $user, Product $product) {

        $cart = $this->cartService->getOrCreateCart($user);
        $this->cartService->addProduct($cart, $product);

        return redirect()->route('products');
    }
}
