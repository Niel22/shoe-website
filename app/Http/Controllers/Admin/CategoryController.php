<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function edit($id)
    {

        $columns = Schema::getColumnListing('categories');

        // Columns to exclude
        $exclude = ['created_at', 'updated_at'];

        // Filter out the excluded columns
        $selectedColumns = array_diff($columns, $exclude);

        // Query using the filtered columns
        $category = Category::select($selectedColumns)->where('id', $id)->first();

        return view('admin.category.edit', compact('category'));
    }
}
