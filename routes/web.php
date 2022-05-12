<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFromController;
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

Route::view('/', 'welcome')->name('home');
//Route::view('about', 'about')->name('about')->middleware("auth");
Route::view('about', 'about')->name('about');
Route::get('contact', [ContactFromController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactFromController::class, 'store'])->name('contact.store');

Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
Route::get('customers/create', [CustomersController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomersController::class, 'store'])->name('customers.store');
Route::get('customers/{customer}', [CustomersController::class, 'show'])->middleware('can:view,customer');
Route::get('customers/{customer}/edit', [CustomersController::class, 'edit']);
Route::patch('/customers/{customer}', [CustomersController::class, 'update']);
Route::delete('/customers/{customer}', [CustomersController::class, 'destroy']);


//Route::resource('customers', CustomersController::class);


// Route::post('/about', function () {
//     return view('about');
// })->name('about');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
