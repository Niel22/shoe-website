<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function edit($id){
        $categories = Category::all();
        $subcategory = SubCategory::where('id', $id)->first();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
}
