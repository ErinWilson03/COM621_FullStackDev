<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


// Book create routes
Route::get("/books/create", [BookController::class, 'create'])->name('books.create');
Route::post("/books", [BookController::class, 'store'])->name('books.store');

// Book read routes
Route::get("/books", [BookController::class, 'index'])->name('books.index');;
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show')
    ->whereNumber('id');

// Book update routes
Route::get("/books/{id}/edit", [BookController::class, 'edit'])->name('books.edit')
    ->whereNumber('id');
Route::put("/books/{id}", [BookController::class, 'update'])->name('books.update')
    ->whereNumber('id');

// Book delete route
Route::delete("/books/{id}", [BookController::class, 'destroy'])->name('books.destroy')
    ->whereNumber('id');

// Review create routes
Route::get("/reviews/create/{id}", [ReviewController::class, "create"])->name("reviews.create");
Route::post("/reviews/{id}", [ReviewController::class, "store"])->name("reviews.store");

// Review read route
Route::get("/reviews/{id}", [ReviewController::class, "show"])->name("reviews.show");

// Review delete route
Route::delete("/reviews/{id}", [ReviewController::class, "destroy"])->name("reviews.destroy");

// User auth routes
Route::post("/logout", [UserController::class, "logout"])
    ->middleware('auth')->name("logout");

Route::middleware('guest')->group(function () {
    Route::get("/register", [UserController::class, "create"])->name("register");
    Route::post("/register", [UserController::class, "store"])->name("register.store");
    Route::get("/login", [UserController::class, "login"])->name("login");
    Route::post("/login", [UserController::class, "authenticate"])->name("login.authenticate");
});
