<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UnloadingController as AdminUnloadingController;
use App\Http\Controllers\Feedback\IndexController as FeedbackIndexController;

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

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', IndexController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('unloading', AdminUnloadingController::class);
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

 Route::group(['prefix' => 'feedback', 'as' => 'feedback.'], static function() {
    Route::get('/', FeedbackIndexController::class)
        ->name('index');
});