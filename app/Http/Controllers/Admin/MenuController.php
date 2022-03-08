<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function newMenuItem()
    {
        $data['categories'] = Category::get();
        return view('admin.menu.new-menu')->with($data);
    }

    public function saveMenuItem(Request $request)
    {
        $slug = Str::slug($request->item_name, '-');
        $slug = $slug.Str::random(6);
        $request->validate([
            'item_name' => 'required|unique:menus',
            'item_price' => 'required|numeric',
            'is_featured' => 'required',
            'item_description' => 'required',
            'item_photo' => 'required|mimes:image,jpg,png',
            'category_id' => 'required'
        ]);

    $image_path = $request->file('item_photo')->store('public/productpics');
        //dd($request);
        Menu::create([
            'item_name' => $request->item_name,
            'item_price' => $request->item_price,
            'is_featured' => $request->is_featured,
            'item_description' => $request->item_description,
            'item_photo' => $image_path,
            'category_id' => $request->category_id,
            'slug' => $slug
        ]);

        return redirect(route('list-menus'))->with('message', 'Menu saved');
    }

    public function listMenuItems()
    {
        //$menu = new Menu();
        $data['menu_items'] = Menu::paginate(10);
        return view('admin.menu.list-menu')->with($data);
    }

public function showMenuItem(Request $request){
    $data['article'] = Menu::where('slug', $request->slug)->first();
    $data['related_items'] = Menu::where('category_id', $data['article']->category_id)->limit(4)->get();
    if(!$data['article']){
        return view('errors.404');
    }
    return view('view-menu')->with($data);
}


    public function activateMenuItem(Request $request)
    {
        Menu::where('id', $request->menu_id)
            ->update(['status' => 1]);
    }

    public function deactivateMenuItem(Request $request)
    {
        Menu::where('id', $request->menu_id)
            ->update(['status' => 0]);
    }

    public function deleteMenuItem(Request $request)
    {
        Menu::where('id', $request->menu_id)->delete();
    }
}
