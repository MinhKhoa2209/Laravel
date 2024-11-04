<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CollectionController extends Controller
{
    public function showAllProduct()
    {
        $all_products = Product::all();
        return view('website.collections.all-products',compact('all_products'));
    }

    public function showSouvenir()
    {
        $souvenir = Product::whereHas('category', function($query) {
            $query->where('name', 'Souvenir'); })->get();
        return view('website.collections.souvenir',compact('souvenir'));
    }

    public function showShoes()
    {
        $shoes = Product::whereHas('category', function($query) {
            $query->where('name', 'Shoes'); })->get();
        return view('website.collections.shoes',compact('shoes'));
    }

    public function showLego()
    {
        $lego = Product::whereHas('category', function($query) {
            $query->where('name', 'Lego'); })->get();
        return view('website.collections.lego',compact('lego'));
    }

    public function showPitcher()
    {
        $pitcher = Product::whereHas('category', function($query) {
            $query->where('name', 'Pitcher'); })->get();

        return view('website.collections.pitcher', compact('pitcher'));
    }

    public function showFallWinterClothes()
    {
        $fall_winter_clothes = Product::whereHas('category', function($query) {
            $query->where('name', 'Fall winter clothes'); })->get();
        return view('website.collections.fall-winter-clothes', compact('fall_winter_clothes'));
    }

    public function showSpringSummerClothes()
    {
        $spring_summer_clothes = Product::whereHas('category', function($query) {
            $query->where('name', 'Spring summer clothes'); })->get();
        return view('website.collections.spring-summer-clothes', compact('spring_summer_clothes'));
    }
}
