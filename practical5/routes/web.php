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
Route::get("/books/create", [BookController::class, 'create'])->name("books.create");
Route::post("/books", [BookController::class, 'store'])->name("books.store");

// Book read routes
Route::get("/books", [BookController::class, 'index'])->name("books.index");
Route::get('/books/{id}', [BookController::class, 'show'])->whereNumber('id')->name("books.show");

// Book update routes
Route::get("/books/{id}/edit", [BookController::class, 'edit'])->whereNumber('id')->name("books.edit");
Route::put("/books/{id}", [BookController::class, 'update'])->whereNumber('id')->name("books.update");

// Book delete route
Route::delete("/books/{id}", [BookController::class, 'destroy'])->whereNumber('id')->name("books.delete");
