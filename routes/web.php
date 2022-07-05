<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SliderController;
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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(AdminController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('/logout', 'destroy')->name('admin.logout');
    Route::get('/profile', 'profile')->name('admin.profile');
    Route::get('/edit-profile', 'editProfile')->name('admin.edit_profile');
    Route::post('/edit-profile', 'storeProfile')->name('admin.update_profile');
    Route::get('/change-password', 'changePassword')->name('admin.change_password');
    Route::post('/change-password', 'updatePassword')->name('admin.update_password');
});


Route::controller(SliderController::class)->group(function(){
    Route::get('/home/slider', 'homeSlider')->name('home.slider');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
});

require __DIR__.'/auth.php';
