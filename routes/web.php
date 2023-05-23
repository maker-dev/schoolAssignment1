<?php

use App\Http\Controllers\OrderController;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
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

Route::get("/", [OrderController::class, "index"])->name("order.index");
Route::get("/create", [OrderController::class, "addOrder"])->name("order.create");
Route::post("/store", [OrderController::class, "storeOrder"])->name("order.store");
Route::get("/modify/{id}", [OrderController::class, "modifyOrder"])->name("order.modify");
Route::put("/modify/{id}", [OrderController::class, "updateOrder"])->name("order.update");
Route::delete("/delete", [OrderController::class, 'destroyOrder'])->name("order.destroy");
