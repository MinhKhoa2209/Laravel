<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Enums\ReviewEnum;
use App\Models\Product;
use App\Services\CategoryService;
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

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $featuredProducts = $this->productService->getListInHomePage(Product::HOME_FEATURED);
        $lego = $this->productService->getCollections();
        $categories = $this->categoryService->getList();
        $reviews = ReviewEnum::REVIEWS;

        return view('website.layouts.homepage', compact('featuredProducts', 'lego', 'reviews' ,'categories'));
    }
}
