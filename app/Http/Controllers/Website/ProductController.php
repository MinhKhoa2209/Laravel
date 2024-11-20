<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('website.products.product_detail', compact('product'));
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');
        $products = Product::query();

        if ($query) {
            $products->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }
        $products = $products->get();

        return view('website.products.search_product', compact('products', 'query'));
    }



}
