<?php

declare(strict_types=1);

use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/ghid/{guide:slug?}', GuideController::class)->name('guide.show');

Route::get('/harta', [HomeController::class, 'mapSection'])->name('map');
Route::get('/cursuri', [HomeController::class, 'coursesSection'])->name('courses');
Route::get('/localizare', [HomeController::class, 'localizeLatLng'])->name('localize');
Route::get('/localize-points', [HomeController::class, 'localizeLatLngPoints'])->name('localizePoints');
Route::get('/cities/{countyId}', [HomeController::class, 'citiesByCounty'])->name('citiesByCounty');
Route::get('/help-points/{countyId}/{cityId?}', [HomeController::class, 'helpPoints'])->name('helpPoints');
Route::get('/courses-list/{countyId}/{cityId?}', [HomeController::class, 'coursesList'])->name('coursesList');
Route::get('/lang/{lang}', [HomeController::class, 'setLocale'])->name('setLocale');

Route::get('/{page:slug}', PageController::class)->name('page');
