<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

route::get('/', [HomeController::class,'index']); 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

route::get('/redirect', [HomeController::class,'redirect']);    
});

route::get('/view_category', [AdminController::class,'view_category']); 
route::post('/add_category', [AdminController::class,'add_category']); 
route::get('delete_category/{ID}', [AdminController::class,'delete_category']); 
route::get('/delete_order/{id}', [AdminController::class,'delete_order']);


route::get('/view_product', [AdminController::class,'view_product']); 
route::post('/add_product', [AdminController::class,'add_product']);
route::get('/search_product', [AdminController::class,'search_product']);

route::get('/show_product', [AdminController::class,'show_product']);
route::get('/delete_product/{id}', [AdminController::class,'delete_product']);
route::get('/update_product/{id}', [AdminController::class,'update_product']);
route::post('/update_product_confirm/{id}', [AdminController::class,'update_product_confirm']);

route::get('/order', [AdminController::class,'order']);
route::get('/delivered/{id}', [AdminController::class,'delivered']);


route::get('/show_user', [AdminController::class,'show_user']);
route::get('/delete_user/{id}', [AdminController::class,'delete_user']);

route::get('/update_user/{id}', [AdminController::class,'update_user']);

route::post('/update_user_confirm/{id}', [AdminController::class,'update_user_confirm']);

route::get('/update_admin/{id}', [AdminController::class,'update_admin']);

route::get('/show_admin', [AdminController::class,'show_admin']);














route::get('/product_details/{id}', [HomeController::class,'product_details']);
route::post('/add_cart/{id}', [HomeController::class,'add_cart']);

route::get('/show_cart', [HomeController::class,'show_cart']);
route::get('/remove_cart/{id}', [HomeController::class,'remove_cart']);
route::get('/cash_order', [HomeController::class,'cash_order']);

route::get('/show_order', [HomeController::class,'show_order']);

route::get('/cancel_order/{id}', [HomeController::class,'cancel_order']);
route::get('/product_search', [HomeController::class,'product_search']);
route::get('/products', [HomeController::class,'products']);


