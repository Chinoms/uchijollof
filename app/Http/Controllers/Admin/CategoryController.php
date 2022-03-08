<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.new-category');
    }

    public function store(Request $request)
    {
        $slug = Str::slug($request->cat_name, '-');
        $slug = $slug.Str::random(6);
        $request->validate([
            'cat_name' => 'required|unique:categories',
            'is_featured' => 'required|numeric',
            'description' => 'required',
            'category_banner' => 'mimes:image,jpg,png',
            'thumbnail' => 'mimes:image,jpg,png',
        ]);

        $cover_image = $request->file('category_banner')->store('public/categorypics');
        $thumbnail = $request->file('thumbnail')->store('public/categorypics');

        $cat = new Category();
        $cat->cat_name = $request->cat_name;
        $cat->cat_description = $request->description;
        $cat->is_featured = $request->is_featured;
        $cat->thumbnail = $thumbnail;
        $cat->cover_image = $cover_image;
        $cat->slug = $slug;

        $cat->save();
    }

    public function listItemsUnderCategory(Request $request){
        $data['category'] = Category::where('slug', $request->slug)->first();
        $data['category_items'] = Menu::where('category_id', $data['category']->id)->get();
        return view('menu-by-category')->with($data);
    }
}
