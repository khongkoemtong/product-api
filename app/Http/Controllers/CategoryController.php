<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // category page 
    public function mygetdata (){
       $allproduct= Product::all();
       $allcategory=Category::all();
        return  view('admin.Category',compact('allproduct','allcategory'));
    }
   
    public function productadminpage(){
        return view('admin.Product');
    }

    // category logic 

    public function store(Request $request){
        
            $request->validate([
                'name'=>'required'

            ]);
            Category::create([
                'name'=>$request->name,
            ]);
            return  redirect()->back()->with('success','insert success');

        
    }
 

    

   
}
