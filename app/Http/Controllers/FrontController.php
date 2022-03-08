<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Menu;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(){
        $data['categories'] = Category::where('is_featured', 1)->get();
        $data['featuredmenu'] = Menu::where('is_featured', 1)->get();
        return view('welcome')->with($data);
    }

    public function about(){
        return view('about');
    }

    public function checkout(){
        return view('checkout');
    }
}
