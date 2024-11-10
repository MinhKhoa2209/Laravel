<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getListInHomePage(int $limit)
    {
        return Product::whereHas('category', function($query) {
            $query->where('name', 'Spring summer clothes');
        })->take($limit)->get();
    }

    public function getCollections()
    {
        return Product::whereIn('id', [4, 6, 10, 12])->get();
    }

    public function searchProducts(string $query = null)
    {
        $products = Product::query();
        if ($query) {
            $products->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }
        return $products->get();
    }

    public function getProductById(int $id)
    {
        return Product::findOrFail($id);
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductsByCategoryName(string $categoryName)
    {
        return Product::whereHas('category', function($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->get();
    }
}
