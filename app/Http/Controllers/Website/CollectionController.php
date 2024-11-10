<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Services\ProductService;

class CollectionController extends Controller
{
    protected $productService;
    
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function showAllProduct()
    {
        $all_products = $this->productService->getAllProducts();
        return view('website.collections.all-products', compact('all_products'));
    }
    public function showCategory($categoryName)
    {
        $categoryName = str_replace(['-', '_'], ' ', $categoryName);
        $products = $this->productService->getProductsByCategoryName($categoryName);
        return view('website.collections.category', compact('products', 'categoryName'));
    }
}
