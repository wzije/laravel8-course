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

Route::get("/", function () {
    return view('home');
});

Route::get("/about", [PageController::class, "about"]);

Route::prefix('posts')->group(function () {
    Route::get('', [PostController::class, "index"]);
    Route::get('/create', [PostController::class, "create"]);
    Route::get('/{id}', [PostController::class, "show"]);
    Route::get('/{id}/edit', [PostController::class, "edit"]);
    Route::post('/', [PostController::class, "store"]);
    Route::put('/{id}', [PostController::class, "update"]);
    Route::delete('/{id}', [PostController::class, "destroy"]);
});


Route::get('/phones', [PhoneController::class, "index"])->name('phones');
Route::get('/phones/search', [PhoneController::class, "search"])->name('phones');
Route::get('/phones/create', [PhoneController::class, "create"])->name('phone-create');
Route::get('/phones/{id}', [PhoneController::class, "show"])->name('phone');
Route::post('/phones', [PhoneController::class, "store"])->name('phone-store');
Route::get('/phones/{id}/edit', [PhoneController::class, "edit"])->name('phone-edit');
Route::put('/phones/{id}', [PhoneController::class, "update"])->name('phone-update');
Route::delete('/phones/{id}', [PhoneController::class, "destroy"])->name('phone-destroy');
