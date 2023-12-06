<?php

use App\Http\Controllers\HalamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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
//for navbar
Route::get('/', [HalamanController::class, 'index'])->name('home');
Route::get('/about', [HalamanController::class, 'about'])->name('about');
Route::get('/contact', [HalamanController::class, 'contact'])->name('kontak');

//contact submit
Route::post('/contact', [HalamanController::class, 'formsubmit'])->name('submit');

//crud
Route::get('/contacts', [ContactController::class, "index"])->name('index');
Route::post('/contacts', [ContactController::class, "store"])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactController::class,"show"])->name('contacts.show');
Route::get('/contacts/{contact}/edit', [ContactController::class,"edit"])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class,"update"])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class,"destroy"])->name('contacts.destroy');

//untuk login
route::get("/login", [UserController::class, "login"])->name('login');
route::post("/do-login", [UserController::class, "doLogin"])->name('doLogin');
// route::post("/do-logout", [UserController::class, "doLogout"])->name('doLogout');
Route::post('/logout', [UserController::class, 'doLogout'])->name('logout');


//auth
Route::middleware(['checkLogin'])->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('index');
    Route::get('/contact', [ContactController::class, 'contact'])->name('kontak');
});

//regis
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('doRegister');

