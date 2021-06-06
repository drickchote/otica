<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,ClientController,HomeController,FrameController,LenController,SunglassController,OrderController,LabController,TreatmentController};
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

Auth::routes();
    
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('clients', ClientController::class);
Route::resource('frames', FrameController::class);
Route::resource('lens', LenController::class);
Route::resource('sunglasses', SunglassController::class);
Route::resource('orders', OrderController::class);
Route::resource('labs', LabController::class);
Route::resource('treatments', TreatmentController::class);

Route::post('/labs/{lab}/attach/{treatment}', 'App\Http\Controllers\LabController@attachTreatment');
Route::post('/labs/{lab}/detach/{treatment}', 'App\Http\Controllers\LabController@detachTreatment');
