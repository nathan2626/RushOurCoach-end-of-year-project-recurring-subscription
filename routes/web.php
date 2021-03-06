<?php

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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('/contact', [App\Http\Controllers\IndexController::class, 'sendContact'])->name('index.send');

Route::get('/reservation', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation.index');
Route::post('/reservation', [App\Http\Controllers\ReservationController::class, 'sendReservation'])->name('reservation.send');

Route::get('/reservation/annulation/{token}', [App\Http\Controllers\AnnulationController::class, 'index'])->name('annulation.index');
Route::post('/reservation/annulation/{token}', [App\Http\Controllers\AnnulationController::class, 'delete'])->name('annulation.delete');

Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('index');
Route::get('/subscriptions', [App\Http\Controllers\SubscriptionsController::class, 'index'])->name('index');

Route::get('/categories/category', [App\Http\Controllers\SingleCategoryController::class, 'index'])->name('index');

Route::get('/categories/category/coach', [App\Http\Controllers\SingleCoachController::class, 'index'])->name('index');

Route::get('/blog/articles', [App\Http\Controllers\ArticlesController::class, 'index'])->name('index');
Route::get('/blog/articles/article', [App\Http\Controllers\ArticlesController::class, 'single'])->name('index.single');


// Admin part

Route::get('/admin', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
Route::get('/admin/articles', [App\Http\Controllers\Admin\ArticlesController::class, 'index'])->name('index');
Route::get('/admin/subscriptions', [App\Http\Controllers\Admin\SubscriptionsController::class, 'index'])->name('index');
Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('index');

Route::post('/admin/articles', [App\Http\Controllers\Admin\ArticlesController::class, 'addArticle'])->name('index.addArticle');
//Route::post('/admin/articles', [App\Http\Controllers\Admin\ArticlesController::class, 'editArticle'])->name('index.editArticle');
//Route::post('/admin/articles', [App\Http\Controllers\Admin\ArticlesController::class, 'deleteArticle'])->name('index.deleteArticle');
Route::post('/admin/articles/edit/{id}', [App\Http\Controllers\Admin\ArticlesController::class, 'editArticle'])->name('index.editArticle');
Route::post('/admin/articles/delete/{id}', [App\Http\Controllers\Admin\ArticlesController::class, 'deleteArticle'])->name('index.deleteArticle');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/dashboard', '\App\Http\Controllers\HomeController@editUser');

Route::get('/dashboard/user/delete/{id}', '\App\Http\Controllers\HomeController@delete')->middleware(['auth']);


