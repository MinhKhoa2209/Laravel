<?php
namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;


class HomePageController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::whereHas('category', function($query) {
            $query->where('name', 'Spring summer clothes');
        })->take(8)->get();

        $lego = Product::whereIn('id', [4, 6, 10, 12])->get();

        $categories = Category::withCount('products')->get();

        $reviews = [
            (object)[
                'author' => 'Nguyễn Văn A',
                'content' => 'Sản phẩm rất tốt, giao hàng nhanh chóng!',
                'date' => '2024-09-10',
                'rating' => 5
            ],
            (object)[
                'author' => 'Trần Thị B',
                'content' => 'Dịch vụ hỗ trợ khách hàng chu đáo.',
                'date' => '2024-08-20',
                'rating' => 4
            ],
            (object)[
                'author' => 'Trần Văn C',
                'content' => 'Giá thành phù hợp',
                'date' => '2024-10-10',
                'rating' => 5
            ],
            (object)[
                'author' => 'Lê D',
                'content' => 'Sản phẩm đúng với mô tả, giao hàng nhanh.',
                'date' => '2024-10-17',
                'rating' => 4
            ],
        ];

        return view('website.layouts.homepage', compact('featuredProducts', 'lego', 'reviews' ,'categories'));

    }
}
