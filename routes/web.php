<?php

use App\Http\Controllers\PhotosController;
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

Route::get('/', [ PhotosController::Class, 'index' ])->name('photos.index');
Route::post('/save', [ PhotosController::Class, 'store' ])->name('photos.create');
Route::get('/saved', [ PhotosController::Class, 'show' ])->name('photos.show');



