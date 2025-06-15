<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

//route untuk menampilkan view blade
Route::get('/', [ProductsController::class, 'welcome']);
Route::get('/products', [ProductsController::class, 'view_products']);
Route::get('/add', [ProductsController::class, 'add_products']);
Route::get('/edit/product/{id}', [ProductsController::class, 'view_update']);


// backend

//route tambah barang
Route::post('/add/store', [ProductsController::class, 'store']);
//route delete data
Route::delete('/delete/{id}', [ProductsController::class, 'delete']);
// route update data
Route::put('/update/{id}', [ProductsController::class, 'update']);
