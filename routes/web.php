<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;
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

Route::get("/", [PageController::class, "index"]);

Route::get("/about", [PageController::class, "about"]);
Route::get("/portofolio", [PageController::class, "portofolio"]);
Route::get("/contact", [PageController::class, "contact"]);
Route::get('/posts', [PostController::class, "index"]);

Route::get('/phones', [PhoneController::class, "index"])->name('phones');
Route::get('/phones/create', [PhoneController::class, "create"])->name('phone-create');
Route::get('/phones/{name}', [PhoneController::class, "showByName"])->name('phone-show-by-name');
// Route::get('/phones/{id}', [PhoneController::class, "show"])->name('phone');
Route::post('/phones', [PhoneController::class, "store"])->name('phone-store');
Route::get('/phones/{id}/edit', [PhoneController::class, "edit"])->name('phone-edit');
Route::put('/phones/{id}', [PhoneController::class, "update"])->name('phone-update');
Route::delete('/phones/{id}', [PhoneController::class, "destroy"])->name('phone-destroy');
