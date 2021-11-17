<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersControllerAPI;
use App\Http\Controllers\API\OrdersControllerAPI;
use App\Http\Controllers\API\ProductsControllerAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users-api', [UsersControllerAPI::class, 'usersAPI']);

Route::post('login', [UsersControllerAPI::class, 'login']);

Route::post('register', [UsersControllerAPI::class, 'register']);

Route::post('orders-api', [OrdersControllerAPI::class, 'ordersAPI']);

Route::post('products-api', [ProductsControllerAPI::class, 'productsAPI']);

//Products
Route::get('get-all-products', [ProductsControllerAPI::class, 'getAllProducts']);
Route::get('get-products', [ProductsControllerAPI::class, 'getProducts']);
Route::get('search-products', [ProductsControllerAPI::class, 'searchProducts']);
