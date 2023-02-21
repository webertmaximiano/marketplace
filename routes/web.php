<?php

use App\Http\Controllers\ProfileController;
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


Route::prefix('/admin')->namespace('App\http\Controllers\Admin')->group(function(){
    //Admin Login Route whithout admin group
    Route::match(['get','post'],'login', 'AdminController@login');
    // Route Grupo Admin
    Route::group(['middleware'=>['admin']],function(){
        //admin dashboard route
         Route::get('dashboard', 'AdminController@dashboard');
         //update Admin password
         Route::match(['get','post'], 'update-admin-password','AdminController@updateAdminPassword');
            
         //Check Admin password
         Route::post('check-admin-password','AdminController@checkAdminPassword');

         //update Admin Details
         Route::match(['get','post'], 'update-admin-details','AdminController@updateAdminDetails');
        //Update Vendor Details
         Route::match(['get','post'], 'update-vendor-details/{slug}','AdminController@updateVendorDetails');
         
         // view Admin - subadmin - vendor
        Route::get('admins/{type?}','AdminController@admins');

        //view vendor details
        Route::get('view-vendor-details/{id}','AdminController@viewVendorDetails');

        //update admin status
        Route::post('update-admin-status', 'AdminController@updateAdminStatus');

         //admin logout
         Route::get('logout', 'AdminController@logout');
    }); 
    // Admin Dashboard Route
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
