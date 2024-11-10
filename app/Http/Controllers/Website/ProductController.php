<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        return view('website.products.product_detail', compact('product'));
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');
        $products = $this->productService->searchProducts($query);
        return view('website.products.search_product', compact('products', 'query'));
    }

}
