<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::group( function () {

    Route::get('/',[ UserController::class, 'home'])->name('home');


    });*/

    Route::get('home',[ UserController::class, 'home'])->name('home');
    Route::get('Waiting',[ UserController::class, 'af_home'])->name('after_home');
    Route::post('Create',[ UserController::class, 'Create'])->name('Add');
    Route::get('location',[ UserController::class, 'location'])->name('location');



    //////////////
    Route::get('Admin/login',[ AdminController::class, 'getlogin'])->name('Login');

    Route::post('checkLogin',[ AdminController::class, 'checkLogin'])->name('admin.login');
    Route::post('Admin/logout',[ AdminController::class, 'logout'])->name('admin.logout');
    Route::get('Admin/Dashboard',[ AdminController::class, 'getDashboard'])->name('Admin.Dashboard');
    Route::get('delete',[ AdminController::class, 'delete'])->name('delete');


    Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
        // Admin Dashboard
 Route::get('Admin/getData',[ AdminController::class, 'getData'])->name('Admin.getData');

    });


    /*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/Home', [App\Http\Controllers\HomeController::class, 'index'])->name('Home');
*/
