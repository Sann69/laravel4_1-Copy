<?php

use App\Http\Controllers\Controller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/index', [Controller::class, 'index']);

Route::get('/products', [Controller::class, 'showProducts']);

Route::get('/products/create', [Controller::class, 'create'])->name('products.create');

Route::post('/products', [Controller::class, 'store'])->name('products.store');

Route::get('/products/list', [Controller::class, 'list'])->name('products.list');

Route::get('/products/index', [Controller::class, 'showProducts'])->name('products.index');

Route::get('/products/{product}/edit', [Controller::class, 'edit'])->name('products.edit');

Route::put('/products/{product}', [Controller::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [Controller::class, 'destroy'])->name('products.destroy');



