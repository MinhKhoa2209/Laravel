<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use App\Services\CartService;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $wishlistService;
    protected $cartService;

    public function __construct(WishlistService $wishlistService, CartService $cartService)
    {
        $this->wishlistService = $wishlistService;
        $this->cartService = $cartService;
    }

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
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Please log in to view your order tracking.');
        }
        $userId = auth()->user()->id;
        $orders = Order::where('user_id', $userId)->get();
        return view('website.pages.order_tracking', compact('orders'));
    }


    public function wishlist()
    {
        $userId = auth()->check() ? auth()->id() : null;
        $wishlistItems = $this->wishlistService->getWishlistItems($userId);
        return view('website.pages.wishlist', compact('wishlistItems'));
    }

    public function addToWishlist($productId)
    {
        $userId = auth()->check() ? auth()->id() : null;
        $response = $this->wishlistService->addToWishlist($userId, $productId);
        return response()->json($response);
    }

    public function removeFromWishlist($productId)
    {
        $userId = auth()->check() ? auth()->id() : null;
        $response = $this->wishlistService->removeFromWishlist($userId, $productId);
        return response()->json($response);
    }

    public function cart(Request $request)
    {
        $userId = auth()->check() ? auth()->id() : null;
        $cartData = $this->cartService->getCartItems($userId);
        $cartItems = $cartData['cartItems'];
        $totalPrice = $cartData['totalPrice'];
        if ($request->wantsJson()) {
            return response()->json(['cart' => $cartItems,'totalPrice' => $totalPrice,]);
        }
        return view('website.pages.cart', compact('cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request, $productId)
    {
        $userId = auth()->check() ? auth()->id() : null;
        $quantity = $request->input('quantity', 1);
        $response = $this->cartService->addToCart($userId, $productId, $quantity);
        return response()->json($response);
    }

    public function removeFromCart($productId)
    {
        $userId = auth()->check() ? auth()->id() : null;
        $response = $this->cartService->removeFromCart($userId, $productId);
        return response()->json($response);
    }

    public function updateCartQuantity(Request $request, $productId)
    {
        $userId = auth()->check() ? auth()->id() : null;
        $quantity = $request->input('quantity');
        $response = $this->cartService->updateCartQuantity($userId, $productId, $quantity);
        return response()->json($response);
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
