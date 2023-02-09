<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index'] );
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);
Route::get('/new-arrivals', [App\Http\Controllers\Frontend\FrontendController::class, 'newArrival ']);
Route::get('/featured-product', [App\Http\Controllers\Frontend\FrontendController::class, 'featuredProduct']);

//Wishlist
Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::prefix('admin')->group(function () {

//     Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);

// });

Route::prefix('admin')->middleware(['auth','isAdm'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    //Category Routes
    Route::controller(App\Http\Controllers\admin\CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');
        Route::get('category/{category}/edit', 'edit');
        Route::put('category/{category}', 'update');
    });
    //Brand Routes
    Route::get('brands', App\Http\Livewire\Admin\Brand\Index::class);

    //Product Controller
    Route::controller(App\Http\Controllers\admin\ProductController::class)->group(function () {
        Route::get('products', 'index');
        Route::get('products/create', 'create');
        Route::post('products', 'store');
        Route::get('products/{product}/edit', 'edit');
        Route::put('products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
        Route::post('product-color/{prod_color_id}', 'updateProductColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProductColor');
    });

    //Color Controller
    Route::controller(App\Http\Controllers\admin\ColorController::class)->group(function () {
        Route::get('color_section', 'index');
        Route::get('color_section/create', 'create');
        Route::post('color_section/create', 'store');
        Route::get('color_section/{color}/edit', 'edit');
        Route::put('color_section/{color}', 'update');
        Route::get('color_section/{color}/delete', 'destroy');
    });

    //Slider Controller
    Route::controller(App\Http\Controllers\admin\SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::get('sliders/create', 'create');
        Route::post('sliders/create', 'store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'destroy');
    });

    //Order Controller
    Route::controller(App\Http\Controllers\admin\OrderController::class)->group(function () {
        Route::get('order', 'index');
        Route::get('/order/{orderId}', 'show');
        Route::put('/order/{orderId}', 'updateOrderStatus');
        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
        // Route::get('sliders/create', 'create');
        // Route::post('sliders/create', 'store');
        // Route::get('sliders/{slider}/edit', 'edit');
        // Route::put('sliders/{slider}', 'update');
        // Route::get('sliders/{slider}/delete', 'destroy');
    });
});



