<?php

namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::orderBy('created_at', 'DESC')->get();

        return view('admin_panel.carts.index', compact('cart'));
    }
}
