<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('website.layouts.header', function ($view) {
            $userId = auth()->check() ? auth()->id() : null;

            $wishlistCount = Wishlist::where('user_id', $userId)->count();
            $cartCount = Cart::where('user_id', $userId)->sum('quantity');

            $categories = Category::withCount('products')->get();

            $view->with(compact('wishlistCount', 'cartCount','categories'));
        });
    }


}

