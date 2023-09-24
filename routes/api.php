<?php

use App\Http\Controllers\apiTransactionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('items/select', [apiTransactionsController::class, 'select'])->name('api.items.select');
Route::post('items/create', [apiTransactionsController::class, 'create'])->name('api.items.create');
Route::get('items/get', [apiTransactionsController::class, 'get'])->name('api.items.get');
Route::get('items/enList', [apiTransactionsController::class, 'enList'])->name('api.items.enList');
Route::post('items/delete', [apiTransactionsController::class, 'delete'])->name('api.items.delete');
Route::post('items/edit', [apiTransactionsController::class, 'edit'])->name('api.items.edit');

