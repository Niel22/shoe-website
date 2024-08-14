<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        return view('admin.color.index');
    }

    public function create(){
        return view('admin.color.create');
    }

    public function edit($id){
        $color = Color::where('id', $id)->select(['id', 'name'])->first();
        
        return view('admin.color.edit', compact('color'));
    }
}
