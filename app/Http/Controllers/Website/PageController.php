<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function about()
    {
        return view('website.pages.about');
    }

    public function blog()
    {
        return view('website.pages.blog');
    }

    public function contact()
    {
        return view('website.pages.contact');
    }

    public function orderTracking()
    {
        return view('website.pages.order-tracking');
    }

    public function privacyPolicy()
    {
        return view('website.pages.privacy_policy');
    }

    public function termsOfService()
    {
        return view('website.pages.terms_of_service');
    }


    public function account()
    {
        $user = auth()->user();
        return view('website.pages.account', compact('user'));
    }

    public function checkOrder() {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('website.pages.order_tracking',compact('orders'));
    }

    public function wishlist()
    {
        $userId = auth()->check() ? auth()->id() : null;
        $wishlistItems = Wishlist::where('user_id', $userId)->with('product')->get();
        return view('website.pages.wishlist', compact('wishlistItems'));
    }


    public function addToWishlist($productId) {
        $userId = auth()->check() ? auth()->id() : null;

        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($wishlistItem) {
            return response()->json(['message' => 'Product is already in your wishlist.'], 200);
        }

        DB::beginTransaction();
        try {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);

            DB::commit();
            $wishlistCount = Wishlist::where('user_id', $userId)->count();

            return response()->json(['message' => 'Product added to wishlist successfully!','wishlistCount' => $wishlistCount], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to add product to wishlist. Please try again.'], 500);
        }
    }


    public function removeFromWishlist($productId)
    {
        $userId = auth()->check() ? auth()->id() : null;
        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();

        if (!$wishlistItem) {
            return response()->json(['error' => 'Product not found in wishlist.'], 404);
        }

        DB::beginTransaction();
        try {
            $wishlistItem->delete();

            DB::commit();
            $wishlistCount = Wishlist::where('user_id', $userId)->count();
            return response()->json(['message' => 'Product removed from wishlist successfully!','wishlistCount' => $wishlistCount], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to remove product from wishlist. Please try again.'], 500);
        }
    }

    public function cart(Request $request)
    {
        $userId = auth()->check() ? auth()->id() : 0;
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        $totalPrice = $cartItems->sum('sub_amount');
        if ($request->wantsJson()) {
            return response()->json(['cart' => $cartItems, 'totalPrice' => $totalPrice]);
        }

        return view('website.pages.cart', compact('cartItems', 'totalPrice'));
    }


   public function addToCart(Request $request, $productId)
   {
       $userId = auth()->check() ? auth()->id() : 0;
       $product = Product::findOrFail($productId);
       $quantity = $request->input('quantity');
       $cartItem = Cart::firstOrCreate(
           ['user_id' => $userId, 'product_id' => $productId],
           ['quantity' => 0, 'sub_amount' => 0]
       );

       $newQuantity = $cartItem->quantity + $quantity;

       if ($newQuantity > $product->quantity) {
           return response()->json(['success' => false, 'message' => "You can only buy up to {$product->quantity} items."], 400);
       }

       $cartItem->quantity = $newQuantity;
       $cartItem->sub_amount = $newQuantity * $product->price;
       $cartItem->save();

       $totalAmount = Cart::where('user_id', $userId)->sum('sub_amount');
       Cart::where('user_id', $userId)->update(['total_amount' => $totalAmount]);

       $cartCount = Cart::where('user_id', $userId)->sum('quantity');
       return response()->json([
           'success' => true,
           'message' => 'Product added to cart!',
           'cart' => Cart::where('user_id', $userId)->with('product')->get(),
           'totalAmount' => $totalAmount,
           'cartCount' => $cartCount,
       ]);
   }

    public function removeFromCart($productId)
    {
        $userId = auth()->check() ? auth()->id() : 0;
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->firstOrFail();
        $cartItem->delete();

        $totalAmount = Cart::where('user_id', $userId)->sum('sub_amount');
        $cartCount = Cart::where('user_id', $userId)->sum('quantity');
        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart!',
            'cart' => Cart::where('user_id', $userId)->with('product')->get(),
            'totalAmount' => $totalAmount,
            'cartCount' => $cartCount,
        ]);
    }
    public function updateCartQuantity(Request $request, $productId)
    {
        $userId = auth()->check() ? auth()->id() : 0;
        $quantity = $request->input('quantity');
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->firstOrFail();
        $cartItem->quantity = $quantity;
        $cartItem->sub_amount = $quantity * $cartItem->product->price;
        $cartItem->save();

        $totalAmount = Cart::where('user_id', $userId)->sum('sub_amount');

        Cart::where('user_id', $userId)->update(['total_amount' => $totalAmount]);

        $updatedCart = Cart::where('user_id', $userId)->with('product')->get();

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully!',
            'cart' => $updatedCart,
            'totalAmount' => $totalAmount,
            'productId' => $productId,
            'subAmount' => $cartItem->sub_amount
        ]);
    }

    public function proceedToCheckout(Request $request)
    {
        if (auth()->guest()) {
            return redirect()->route('login')->with('You have to login before check out.');
        }
        $validatedData = $request->validate([
            'check_date' => 'nullable|date',
            'check_time' => 'nullable|string',
            'order_note' => 'nullable|string|max:255',
        ]);
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        session([
            'check_date' => $validatedData['check_date'] ?? null,
            'check_time' => $validatedData['check_time'] ?? null,
            'order_note' => $validatedData['order_note'] ?? null,
        ]);
        return redirect()->route('pages.checkout');
    }

    public function checkout(Request $request)
    {
        $userId = auth()->id();
        $user = User::find($userId);
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        $checkDate = session('check_date');
        $checkTime = session('check_time');
        $orderNote = session('order_note');
        return view('website.pages.checkout', compact('cartItems', 'user', 'checkDate', 'checkTime', 'orderNote'));
    }

    public function countQuantity() {
        $userId = auth()->check() ? auth()->id() : null;
        $wishlistCount = Wishlist::where('user_id', $userId)->count();
        $cartCount = Cart::where('user_id', $userId)->sum('quantity');
        return view('website.layouts.homepage', compact('wishlistCount', 'cartCount'));
    }
}
