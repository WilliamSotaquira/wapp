<?php

use App\Http\Controllers\Admin\BudgetsController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\SprintsController;
use App\Http\Controllers\Admin\TasksController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\WalletsController;
use App\Models\Sprint;
use App\Models\Task;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::resource('wallets', WalletsController::class);
Route::resource('budgets', BudgetsController::class);
Route::resource('sprints', SprintsController::class);
Route::resource('tasks', TasksController::class);
Route::resource('items', ItemsController::class);
Route::resource('transactions', TransactionsController::class);
