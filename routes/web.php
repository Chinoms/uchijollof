<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', 'App\Http\Controllers\FrontController@home');
Route::get('new-location', 'App\Http\Controllers\Admin\LocationsController@createLocation');
Route::post('save-location', 'App\Http\Controllers\Admin\LocationsController@saveLocation')->name('savelocation');
Route::get('list-locations', 'App\Http\Controllers\Admin\LocationsController@listLocations');
Route::get('new-menu-item', 'App\Http\Controllers\Admin\MenuController@newMenuItem')->middleware('auth');
Route::post('savemenuitem', 'App\Http\Controllers\Admin\MenuController@saveMenuItem')->middleware('auth')->name('savemenuitem');
Route::get('list-menu-items', 'App\Http\Controllers\Admin\MenuController@listMenuItems')->middleware('auth')->name('list-menus');
Route::get('new-category', 'App\Http\Controllers\Admin\CategoryController@create')->middleware('auth');
Route::post('save-category', 'App\Http\Controllers\Admin\CategoryController@store')->middleware('auth')->name('savecategory');
Route::get('menu/{slug}', 'App\Http\Controllers\Admin\MenuController@showMenuItem');
Route::get('category/{slug}', 'App\Http\Controllers\Admin\CategoryController@listItemsUnderCategory');
Route::get('about', 'App\Http\Controllers\FrontController@about');
Route::get('checkout', 'App\Http\Controllers\FrontController@checkout');
require __DIR__.'/auth.php';
