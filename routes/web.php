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
})->name('home');
Route::view('/about','pages.about')->name('about');
Route::view('/contact','pages.contact')->name('contact');
Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('workshops',[\App\Http\Controllers\WorkshopController::class,'all'])->name('workshops.all');
    Route::get('workshop/{id}',[\App\Http\Controllers\WorkshopController::class,'show'])->name('workshops.single');
    Route::post('/workshop/{id}/register',[\App\Http\Controllers\RegistrationController::class,'register'])->name('workshops.register');

    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('profile');
    Route::post('/profile/update',[\App\Http\Controllers\HomeController::class,'updateProfile'])
        ->name('profile.update');
});
Route::middleware('role:trainer')->group(function () {
    Route::post('workshops/create',[\App\Http\Controllers\WorkshopController::class,'store'])->name('workshops.create');
});


Route::group(['prefix'=>'admin/','as'=>'admin.'],function () {
    Route::view('login','admin.login')->name('login');
    Route::post('/login',[\App\Http\Controllers\Admin\LoginController::class,'login'])->name('login');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'home'])->name('home');
        Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'home'])
            ->name('profile');
        Route::post('/profile/update',[\App\Http\Controllers\Admin\HomeController::class,'updateProfile'])
            ->name('profile.update');

        Route::prefix('workshops')->as('workshops.')->group(function() {
            Route::get('/',[\App\Http\Controllers\Admin\WorkshopController::class,'all'])->name('all');
            Route::post('/create',[\App\Http\Controllers\Admin\WorkshopController::class,'store'])->name('store');
            Route::get('/{id}',[\App\Http\Controllers\Admin\WorkshopController::class,'show'])->name('single');
            Route::get('/{id}/edit',[\App\Http\Controllers\Admin\WorkshopController::class,'edit'])->name('edit');
            Route::post('/{id}/update',[\App\Http\Controllers\Admin\WorkshopController::class,'update'])->name('update');
            Route::get('/{id}/delete',[\App\Http\Controllers\Admin\WorkshopController::class,'delete'])->name('delete');
        });

        Route::get('/trainers/search',[\App\Http\Controllers\Admin\HomeController::class,'searchTrainer'])->name('trainer.search');
        Route::post('/logout',[\App\Http\Controllers\Admin\LoginController::class,'logout'])->name('logout');
    });
});
