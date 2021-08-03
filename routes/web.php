<?php

use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChefsController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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


Route::get('/redirect', [HomeController::class, 'redirect_user']);

#admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('user.delete');

#Food
Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create');
Route::post('/foods/create', [FoodController::class, 'store'])->name('foods.store');
Route::get('/foods/{id}', [FoodController::class, 'status_update'])->name('foods.status');
Route::get('/foods/{id}/edit', [FoodController::class, 'edit'])->name('foods.edit');
Route::put('/foods/{id}', [FoodController::class, 'update'])->name('foods.update');
Route::delete('/foods/{id}', [FoodController::class, 'destroy'])->name('foods.delete');

#reservation
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/{id}', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservation/{id}', [ReservationController::class, 'update'])->name('reservation.update');

#Chefs
Route::get('/chefs', [ChefsController::class, 'index'])->name('chefs.index');
Route::get('/chefs/create', [ChefsController::class, 'create'])->name('chefs.create');
Route::post('/chefs', [ChefsController::class, 'store'])->name('chefs.store');
Route::get('/chefs/{id}/edit', [ChefsController::class, 'edit'])->name('chefs.edit');
Route::put('/chefs/{id}', [ChefsController::class, 'update'])->name('chefs.update');

#Home
Route::get('/', [HomeController::class, 'index'])->name('home');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
