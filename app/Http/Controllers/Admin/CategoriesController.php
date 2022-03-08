<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function newCategory()
    {
        return view('admin.category.new-category');
    }

    public function listMenuItems()
    {
        //$menu = new Menu();
        $data['categories'] = Category::get();
        return view('admin.category.list-categories')->with($data);
    }

    public function editCategory(Request $request){

    }


  
}
