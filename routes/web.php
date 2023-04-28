<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
  return view('auth.login');
});
//route with resource
Route::resource('blog', BlogController::class);
Route::resource('post', PostController::class);
Route::resource('permission', PermissionController::class);
Route::resource('user', userController::class);
Route::resource('role', roleController::class);
Route::resource('author', AuthorController::class);

//manually routeCRUD
Route::get('note', [NoteController::class, 'index'])->name('note.index');
Route::get('note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('note/store', [NoteController::class, 'store'])->name('note.store');
Route::get('note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
Route::post('note/update/{note}', [NoteController::class, 'update'])->name('note.update');
Route::get('note/show/{note}', [NoteController::class, 'show'])->name('note.show');
Route::post('note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy');


//route for admin

Route::get('admin', [AdminController::class, 'index'])->name('admin');

Route::get('admin/widget', [AdminController::class, 'widget'])->name('admin.widget');

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//route ::prefix group route

// Route::prefix('admin')->group(function () {
//   //route with resource
//   Route::resource('blog', BlogController::class);
//   Route::resource('post', PostController::class);

//   //manually routeCRUD
//   Route::get('note', [NoteController::class, 'index'])->name('note.index');
//   Route::get('note/create', [NoteController::class, 'create'])->name('note.create');
//   Route::post('note/store', [NoteController::class, 'store'])->name('note.store');
//   Route::get('note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
//   Route::post('note/update/{note}', [NoteController::class, 'update'])->name('note.update');
//   Route::get('note/show/{note}', [NoteController::class, 'show'])->name('note.show');
//   Route::post('note/destroy/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
// });
