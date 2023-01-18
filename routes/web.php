<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
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

Route::group(['prefix' => ''], static function() {
    Route::get('/', [WelcomeController::class, 'index'])
        ->name('welcome');
    Route::get('/category', [NewsController::class, 'indexCategory'])
     ->name('category');
    Route::get('/category/{id}/show', [NewsController::class, 'showCategory'])
    ->where('id', '\d+')
        ->name('category.show');
    Route::get('/news', [NewsController::class, 'indexNews'])
     ->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'showNews'])
    ->where('id', '\d+')
        ->name('news.show');
 });
