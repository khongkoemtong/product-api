<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required|exists:category,id',
            'stock' => 'required',

        ]);

        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'stock' => $request->stock,

        ]);

        return redirect()->back()->with('success', 'insert product success');
    }
    private function fetchProductsData()
    {
        $allproduct = Product::all();
        $allcategory = Category::all();
        
        $CountProduct = Product::select('category_id', DB::raw('count(*) as total'))
            ->groupBy('category_id')
            ->pluck('total', 'category_id');
        return compact('allproduct', 'allcategory', 'CountProduct');
    }

    public function showHome()
    {
        return view('admin.Home', $this->fetchProductsData());
    }

    public function showProduct()
    {
        return view('admin.Product', $this->fetchProductsData());
    }
}
