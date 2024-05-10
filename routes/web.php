<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

//proses tambah produk
Route::post('/{user}/post-request', [UserController::class, 'postRequest'])->name('postRequest');

//form tambah produk
Route::get('/{user}/tambah-product', [UserController::class, 'handleRequest'])->name('form_product');

//tampil all produk
Route::get('/products', [UserController::class, 'getProduct'])->name('get_product');

//form edit produk
Route::get('/{user}/product/{product}', [UserController::class, 'editProduct'])->name('edit_product');

//proses edit produk
Route::put('/{user}/product/{product}/update', [UserController::class, 'updateProduct'])->name('update_product');

//delete produk
Route::post('/{user}/product/{product}/delete', [UserController::class, 'deleteProduct'])->name('delete_product');

//hal profile
Route::get('/profile/{user}', [UserController::class, 'getProfile'])->name('get_profile');

//hal admin
Route::get('/admin/{user}/list-products', [UserController::class, 'getAdmin'])->name('admin_page');

// Route::post('/posts/{post}/delete', [PostController::class, 'delete']);
