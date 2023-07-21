<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/add/post', [Controller::class, 'AddPost'])->name('add.post');
    Route::get('/view/post/{id}', [Controller::class, 'ViewPost'])->name('view.post');

    Route::post('/store/post', [Controller::class, 'StorePost'])->name('store.post');
    Route::get('/edit/post/{id}', [Controller::class, 'EditPost'])->name('edit.post');
    Route::post('/update/post', [Controller::class, 'UpdatePost'])->name('update.post');
    Route::get('/delete/post/{id}', [Controller::class, 'DeletePost'])->name('delete.post');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
