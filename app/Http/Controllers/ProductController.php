<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productsPage()
    {
        $categories = Product::select('category')->distinct()->get()->pluck('category');
        $brands = Product::select('brand')->distinct()->get()->pluck('brand');
        $productsCount = Product::count(); 

        return view('products',compact('categories','brands','productsCount'));
    }

    public function getProducts()
    {
        $page = request('page');
        
        $productsQuery = Product::limit(6 * $page);

        $productsQuery->when(request('categories'),function($q, $categories){
            $q->whereIn('category', $categories);
        });

        $productsQuery->when(request('brands'),function($q, $brands){
            $q->whereIn('brand', $brands);
        });

        $productsQuery->when(request('search'),function($q, $search){
            $q->where(function($q) use ($search){
                 $q->where('product','like', "%" . $search . "%")
                ->orWhere('category','like', "%" . $search . "%")
                ->orWhere('brand','like', "%" . $search . "%");
            });
        });

        $products = $productsQuery->get();

        return response()->json([
            'products' => $products
        ]);
    }
}
