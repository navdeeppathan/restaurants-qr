<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\MenuController;

/* ADMIN */
Route::get('/admin/categories', [CategoryController::class, 'index']);
Route::post('/admin/categories', [CategoryController::class, 'store']);
Route::get('/admin/category/{category}/qr', [CategoryController::class, 'generateQr']);

/* MENU */
Route::get('/menu/{category:slug}', [MenuController::class, 'categoryItems']);
Route::get('/menu/item/{item}', [MenuController::class, 'itemDetail']);

use App\Http\Controllers\Admin\ItemController;

Route::get('/admin/items', [ItemController::class, 'index']);
Route::post('/admin/items', [ItemController::class, 'store']);
