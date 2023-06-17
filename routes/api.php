<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIProductController;
use App\Http\Controllers\APICheckoutController;
use App\Http\Controllers\APITransactionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('products', [APIProductController::class, 'all']);
Route::get('v1/products', [APIProductController::class, 'all']);
Route::post('v1/checkout', [APICheckoutController::class, 'checkout']); // http://0.0.0.0/api/checkout
Route::get('v1/transactions/{id}', [APITransactionController::class, 'get']); // http://0.0.0.0/api/transactions/7
