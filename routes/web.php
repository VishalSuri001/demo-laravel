<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
    Route::get('/admin-logout', 'destroy')->name('admin.logout');
    Route::get('/admin-profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit-profile', 'editProfile')->name('admin.edit_profile');
    Route::post('/admin/edit-profile', 'storeProfile')->name('admin.update_profile');
    Route::get('/admin/change-password', 'changePassword')->name('admin.change_password');
    Route::post('/admin/change-password', 'updatePassword')->name('admin.update_password');
});

require __DIR__.'/auth.php';
