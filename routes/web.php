<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibrarianController;
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




Route::middleware(['web','guest'])->group(function() {
    Route::get('/',function() {
        return view("home");
    })->name("home");
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login/store', [AuthController::class, "login"])->name('login-store');
});





Route::middleware(['auth'])->group(function() {
    Route::get("/logout", [AuthController::class, "logout"])->name('logout');
});

//Admin routes
Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get("admin/dashboard", function() {
        return view("admin.dashboard");
    })->name("admin-dash");

    Route::prefix("librarians")->group(function() {
        Route::get("/", [LibrarianController::class, "index"])
            ->name('librarians-list');
    });


});

//Librarian Routes
Route::middleware(['auth'])->group(function() {
    Route::get("librarian/dashboard", function() {
        return view("librarian.dashboard");
    })->name("librarian-dash");
});
