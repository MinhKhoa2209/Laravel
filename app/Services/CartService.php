<?php
namespace App\Services;
use App\Models\Cart;
use App\Models\Product;

class CartService
{
    public function getCartItems($userId)
    {
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        $totalPrice = $cartItems->sum('sub_amount');
        return [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ];
    }

    public function addToCart($userId, $productId, $quantity)
    {
        $product = Product::findOrFail($productId);
        $cartItem = Cart::firstOrCreate(
            ['user_id' => $userId, 'product_id' => $productId],
            ['quantity' => 0, 'sub_amount' => 0]
        );

        $newQuantity = $cartItem->quantity + $quantity;

        if ($newQuantity > $product->quantity) {
            return [
                'success' => false,
                'message' => "You can only buy up to {$product->quantity} items."
            ];
        }
        $cartItem->quantity = $newQuantity;
        $cartItem->sub_amount = $newQuantity * $product->price;
        $cartItem->save();
        $totalAmount = Cart::where('user_id', $userId)->sum('sub_amount');
        Cart::where('user_id', $userId)->update(['total_amount' => $totalAmount]);
        return [
            'success' => true,
            'message' => 'Product added to cart!',
            'cart' => Cart::where('user_id', $userId)->with('product')->get(),
            'totalAmount' => $totalAmount,
            'cartCount' => Cart::where('user_id', $userId)->count(),
        ];
    }

    public function removeFromCart($userId, $productId)
    {
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->firstOrFail();
        $cartItem->delete();
        $totalAmount = Cart::where('user_id', $userId)->sum('sub_amount');
        return [
            'success' => true,
            'message' => 'Product removed from cart!',
            'cart' => Cart::where('user_id', $userId)->with('product')->get(),
            'totalAmount' => $totalAmount,
            'cartCount' => Cart::where('user_id', $userId)->count(),
        ];
    }

    public function updateCartQuantity($userId, $productId, $quantity)
    {
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->firstOrFail();
        $cartItem->quantity = $quantity;
        $cartItem->sub_amount = $quantity * $cartItem->product->price;
        $cartItem->save();
        $totalAmount = Cart::where('user_id', $userId)->sum('sub_amount');
        Cart::where('user_id', $userId)->update(['total_amount' => $totalAmount]);
        $updatedCart = Cart::where('user_id', $userId)->with('product')->get();
        return [
            'success' => true,
            'message' => 'Cart updated successfully!',
            'cart' => $updatedCart,
            'totalAmount' => $totalAmount,
            'productId' => $productId,
            'subAmount' => $cartItem->sub_amount,
            'cartCount' => Cart::where('user_id', $userId)->count(),
        ];
    }
}
