<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HomePageEtcController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Chart Data Route
Route::get('/chartData', [ChartController::class, 'onAllSelect']);
// Client Review Route
Route::get('/clientReview', [ClientReviewController::class, 'onAllSelect']);
// Contact Route
Route::post('/contactSend', [ContactController::class, 'onContactSend']);
// Course Home
Route::get('/courseHome', [CoursesController::class, 'onSelectFour']);
// Course All
Route::get('/courseAll', [CoursesController::class, 'onSelectAll']);
// Course Details
Route::get('/courseDetails/{id}', [CoursesController::class, 'courseDetails']);
//  Footer Details Route
Route::get('/footerData', [FooterController::class, 'onSelectAll']);
// Information Data
Route::get('/information', [InformationController::class, 'onSelectAll']);
// Service Data
Route::get('/services', [ServiceController::class, 'ServiceView']);
// Project All Routes
Route::get('/projectHome', [ProjectController::class, 'OnSelectThree']);
Route::get('/projectAll', [ProjectController::class, 'OnSelectAll']);
Route::get('projectDetails/{projectId}', [ProjectController::class, 'projectDetails']);

// Home etc routes
Route::get('/home/video', [HomePageEtcController::class, 'SelectVideo']);
Route::get('/totalHome', [HomePageEtcController::class, 'SelectTotalHome']);
Route::get('/techHome', [HomePageEtcController::class, 'SelectTechHome']);
Route::get('/homepage/title', [HomePageEtcController::class, 'SelectHomeTitle']);