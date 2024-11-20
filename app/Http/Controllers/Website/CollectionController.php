<?php


namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;


class CollectionController extends Controller
{

    public function showAllProduct()
    {
        $all_products = Product::all();
        return view('website.collections.all-products', compact('all_products'));
    }

    public function showCategory($categoryName)
    {
        $categoryName = str_replace(['-', '_'], ' ', $categoryName);
        $products = Product::whereHas('category', function($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->get();

        return view('website.collections.category', compact('products', 'categoryName'));
    }
}
