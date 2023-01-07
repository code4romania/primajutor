<?php

declare(strict_types=1);

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MapController;
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
Route::get('/cursuri', [CourseController::class, 'index'])->name('courses.index');
Route::get('/cursuri/{county}/{city?}', [CourseController::class, 'search'])->name('courses.search');

Route::get('/harta', [MapController::class, 'show'])->name('map');
Route::get('/harta/localizare', [MapController::class, 'localize'])->name('map.localize');
Route::get('/harta/puncte', [MapController::class, 'points'])->name('map.points');
Route::get('/harta/puncte/{county}/{city?}', [MapController::class, 'pointsSearch'])->name('map.points.search');
Route::get('/harta/orase/{county}', [MapController::class, 'citiesInCounty'])->name('map.citiesInCounty');

Route::get('/locale/{locale}', LocaleController::class)->name('setLocale');

Route::get('/{page:slug}', PageController::class)->name('page');
