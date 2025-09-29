<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
#for normal user(audion)
Route::get('/', function () {
    return view('home');
});
#for admin post article
Route::get('/Admin',function(){
    return view('articleutility.adminpage');
});
Route::get('/Admin/createarticle',function(){
    return view('articleutility.createArticle');
});

// Author CRUD routes
Route::get('/Admin/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/Admin/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/Admin/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/Admin/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');
Route::get('/Admin/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/Admin/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::delete('/Admin/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');