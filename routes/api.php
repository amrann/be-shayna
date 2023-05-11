<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIProductController;
use App\Http\Controllers\APICheckoutController;

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
Route::get('/products', [APIProductController::class, 'all']);
Route::post('checkout', [APICheckoutController::class, 'checkout']);
// Route::get('/products', 'App\Http\Controllers\API\APIProductController@all');
