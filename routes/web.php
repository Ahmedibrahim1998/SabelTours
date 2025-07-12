<?php

use App\Http\Controllers\HomeController;
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
// routes To log in Dashboard

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

    //==============================================Dashboard==========================================
    Route::group(['namespace' => 'Admin'], function () {

        Route::resource('governorates', GovernorateController::class);
        Route::resource('places', PlaceController::class);
        Route::resource('place-details', PlaceDetailController::class);

        Route::resource('clients', ClientController::class);

        Route::resource('educations', 'EducationController');

        // User And Roles And Permissions
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
    });

});
