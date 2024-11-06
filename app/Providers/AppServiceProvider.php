<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('website.layouts.header', function ($view) {
            $user = auth()->user();

            if ($user) {
                $wishlistCount = Wishlist::where('user_id', $user->id)->count();
                $cartCount = Cart::where('user_id', $user->id)->sum('quantity');
            } else {
                $wishlistCount = Wishlist::whereNull('user_id')->count();
                $cartCount = Cart::whereNull('user_id')->sum('quantity');
            }

            $view->with(compact('wishlistCount', 'cartCount'));
        });
    }

}

