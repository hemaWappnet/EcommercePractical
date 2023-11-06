<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productCategories = ProductCategory::all();
        return view('products.index', compact('products', 'productCategories'));
    }

    public function filter(Request $request)
    {
        $productCategories = ProductCategory::all();
        $category = $request->input('productCategory');
        $tags = $request->input('tags');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $filteredProducts = Product::query();

        if ($category) {
            $filteredProducts->where('product_category_id', $category);
        }

        if ($tags) {            
            $tagsArray = explode(',', $tags);
            foreach ($tagsArray as $tag) {
                $filteredProducts->where('tags', 'LIKE', "%" . $tag . "%");
            }                        
        }

        if ($minPrice) {
            $filteredProducts->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $filteredProducts->where('price', '<=', $maxPrice);
        }

        $products = $filteredProducts->get();

        return view('products.index', compact('products', 'productCategories', 'category', 'tags', 'minPrice', 'maxPrice'));
    }
}
