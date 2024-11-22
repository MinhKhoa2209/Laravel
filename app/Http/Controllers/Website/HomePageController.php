<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\OrderService;
use App\Services\ProductService;

class HomePageController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * @var CategoryService
     */
    protected $categoryService;
    protected $orderService;

    public function __construct(ProductService $productService, CategoryService $categoryService, OrderService $orderService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $featuredProducts = $this->productService->getListInHomePage(Product::HOME_FEATURED);
        $lego = $this->productService->getCollections();
        $categories = $this->categoryService->getList();
        $reviews = $this->orderService->showFeedback(auth()->user()->id);

        return view('website.layouts.homepage', compact('featuredProducts', 'lego', 'reviews' ,'categories'));
    }
}
