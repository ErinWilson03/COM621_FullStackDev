<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


// Book create routes
Route::get("/books/create", [BookController::class, 'create']);
Route::post("/books", [BookController::class, 'store']);

// Book read routes
Route::get("/books", [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show'])->whereNumber('id');

// Book update routes
Route::get("/books/{id}/edit", [BookController::class, 'edit'])->whereNumber('id');
Route::put("/books/{id}", [BookController::class, 'update'])->whereNumber('id');

// Book delete route
Route::delete("/books/{id}", [BookController::class, 'destroy'])->whereNumber('id');
