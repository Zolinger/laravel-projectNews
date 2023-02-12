<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\UnloadingController as AdminUnloadingController;

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

Route::group(['middleware' => 'auth'], static function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');

    //admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function() {
    Route::get('/', AdminIndexController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('feedback', AdminFeedbackController::class);
    Route::resource('unloading', AdminUnloadingController::class);
    Route::resource('users', UserController::class);
});
});



Route::group(['prefix' => ''], static function() {
    Route::get('/', [NewsController::class, 'indexNews'])
        ->name('news');
    Route::get('/category', [NewsController::class, 'indexCategory'])
     ->name('category');
    Route::get('/category/{id}/show', [NewsController::class, 'showCategory'])
    ->where('id', '\d+')
        ->name('category.show');
    Route::get('/news/{id}/show', [NewsController::class, 'showNews'])
    ->where('id', '\d+')
        ->name('news.show');
 });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
