<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\OngkirController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\MidtransController;

Route::get('/',[FrontendController::class, 'index']);
Route::get('category',[FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);
Route::get('all-product', [FrontendController::class, 'allproductview']);
Route::get('term-condition', [FrontendController::class, 'tncview']);

Route::get('shipping-cost', [OngkirController::class, 'index']);
// Route::get('shipping-cost', [OngkirController::class, 'test']);
Route::get('getCity/ajax/{id}', [OngkirController::class, 'ajax']);

Route::get('product-list', [FrontendController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontendController::class, 'searchProduct']);
Auth::routes();

Route::get('load-cart-data',[CartController::class, 'cartcount']);
Route::get('load-wishlist-count',[WishlistController::class, 'wishlistcount']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']); 
Route::post('update-cart', [CartController::class, 'updatecart']); 

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);

// midtrans
Route::post('midtrans-callback', [MidtransController::class, 'notificationHandler']);
Route::get('midtrans-finish', [MidtransController::class, 'finishRedirect']);
Route::get('midtrans-unfinish', [MidtransController::class, 'unfinishRedirect']);
Route::get('midtrans-error', [MidtransController::class, 'errorRedirect']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::get('city/{id}', [CheckoutController::class, 'kota']);
    Route::get('tarif/{des}/{wg}/{cour}', [CheckoutController::class, 'tarif'])->name('tarif');
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::post('proceed-to-pay', [CheckoutController::class, 'paycheck']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');
    
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class,'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::resource('size', SizeController::class);
    Route::resource('color', ColorController::class);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
    
    
    Route::get('orders',[OrderController::class, 'index']);
    Route::get('admin/view-order/{id}',[OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);    
});