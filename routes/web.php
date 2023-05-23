<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
Route::view('/view', 'landing.index');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    // Route::group(['middleware' => ['guest']], function () {
    //     /**
    //      * Register Routes
    //      */
    // Route::get('/register', 'RegisterController@show')->name('register.show');
    // Route::post('/register', 'RegisterController@register')->name('register.perform');

    //     /**
    //      * Login Routes
    //      */
    // });
});
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::group(['middleware' => ['auth']], function () {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    // START POST //
    Route::delete('/post/image/{post}', [PostController::class, 'deleteImage'])->name('post.image.delete');
    Route::put('post/restore/{post}', [PostController::class, 'restore'])->name('post.restore');
    Route::get('post/soft-deleted', [PostController::class, 'indexSoftDeleted'])->name('data-softdeleted.index');
    Route::delete('/deletePermanently/{post}', [PostController::class, 'deletePermanently'])->name('posts.delete-permanently');
    Route::resource('post', PostController::class);
    // END POST //

    // START CATEGORY //
    Route::resource('category', CategoryController::class);
    // END CATEGORY //
});
