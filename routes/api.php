<?php

use App\Http\Controllers\API\AboutUsController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\GovernorateController;
use App\Http\Controllers\API\PlaceController;
use App\Http\Controllers\API\SectionController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\SubTourController;
use App\Http\Controllers\API\TourController;
use App\Http\Controllers\API\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "API" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
], function () {
    // Home Page Route
    Route::get('governorates', [GovernorateController::class, 'index']);
    Route::get('governorates/{id}/places', [PlaceController::class, 'index']);
    Route::get('places/{id}', [PlaceController::class, 'show']);

    // section
    Route::get('sections', [SectionController::class, 'index']);
    Route::get('sections/{id}', [SectionController::class, 'show']);

    //   clients
    Route::get('clients', [ClientController::class, 'index']);

    // Booking
    Route::post('bookings', [BookController::class, 'store']);

    // Contact Us

    Route::post('contact', [ContactController::class, 'store']);

    // About Us

    Route::get('about', [AboutUsController::class, 'index']);

    // Tours

    Route::get('tours', [TourController::class, 'index']);
    Route::get('/tours/{id}/details', [TourController::class, 'show']);
    Route::get('/sub-tours-by-type', [SubTourController::class, 'indexByType']);

    // comments
    Route::post('/comments', [CommentController::class, 'store']);

    // Book Trip
    Route::post('/trips', [TripController::class, 'store']);

    // Review TourDeatils
    Route::get('/reviews/{tour_detail_id}', [CommentController::class, 'reviews']);


});
