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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'as' => 'home.'], function () {

    Route::group(['as' => 'languages.', 'prefix' => 'languages'], function () {
        Route::get('/', [\App\Http\Controllers\LanguageController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\LanguageController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\LanguageController::class, 'store'])->name('store');
        Route::get('/{language}', [\App\Http\Controllers\LanguageController::class, 'show'])->name('show');
        Route::get('edit/{language}', [\App\Http\Controllers\LanguageController::class, 'edit'])->name('edit');
        Route::put('/{language}', [\App\Http\Controllers\LanguageController::class, 'update'])->name('update');
        Route::delete('/{language}', [\App\Http\Controllers\LanguageController::class, 'destroy'])->name('delete');
    });


    Route::group(['as' => 'countries.', 'prefix' => 'countries'], function () {
        Route::get('/', [\App\Http\Controllers\CountryController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\CountryController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\CountryController::class, 'store'])->name('store');
        Route::get('/{country}', [\App\Http\Controllers\CountryController::class, 'show'])->name('show');
        Route::get('edit/{country}', [\App\Http\Controllers\CountryController::class, 'edit'])->name('edit');
        Route::put('/{country}', [\App\Http\Controllers\CountryController::class, 'update'])->name('update');
        Route::delete('/{country}', [\App\Http\Controllers\CountryController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'currencies.', 'prefix' => 'currencies'], function () {
        Route::get('/', [\App\Http\Controllers\CurrencyController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\CurrencyController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\CurrencyController::class, 'store'])->name('store');
        Route::get('/{currency}', [\App\Http\Controllers\CurrencyController::class, 'show'])->name('show');
        Route::get('edit/{currency}', [\App\Http\Controllers\CurrencyController::class, 'edit'])->name('edit');
        Route::put('/{currency}', [\App\Http\Controllers\CurrencyController::class, 'update'])->name('update');
        Route::delete('/{currency}', [\App\Http\Controllers\CurrencyController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'authors.', 'prefix' => 'authors'], function () {
        Route::get('/', [\App\Http\Controllers\AuthorController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\AuthorController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\AuthorController::class, 'store'])->name('store');
        Route::get('/{author}', [\App\Http\Controllers\AuthorController::class, 'show'])->name('show');
        Route::get('edit/{author}', [\App\Http\Controllers\AuthorController::class, 'edit'])->name('edit');
        Route::put('/{author}', [\App\Http\Controllers\AuthorController::class, 'update'])->name('update');
        Route::delete('/{author}', [\App\Http\Controllers\AuthorController::class, 'destroy'])->name('delete');
    });


    Route::group(['as' => 'books.', 'prefix' => 'books'], function () {
        Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\BookController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\BookController::class, 'store'])->name('store');
        Route::get('/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name('show');
        Route::get('edit/{book}', [\App\Http\Controllers\BookController::class, 'edit'])->name('edit');
        Route::put('/{book}', [\App\Http\Controllers\BookController::class, 'update'])->name('update');
        Route::delete('/{book}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('delete');
    });
});
