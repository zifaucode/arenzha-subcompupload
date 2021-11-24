<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubcompanyController;
use App\Http\Controllers\UploadController;

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
    return view('home');
});

Route::prefix('/subcompany')->group(function () {
    Route::get('/', [SubcompanyController::class, 'index']);
    Route::get('/create', [SubcompanyController::class, 'create']);
    Route::post('/', [SubcompanyController::class, 'store']);
    Route::get('/edit/{id}', [SubcompanyController::class, 'edit']);
    Route::get('/detail/{id}', [SubcompanyController::class, 'detail']);
    Route::patch('/{id}', [SubcompanyController::class, 'update']);
    Route::delete('/{id}', [SubcompanyController::class, 'destroy']);
});


Route::prefix('/upload')->group(function () {
    Route::get('/', [UploadController::class, 'index']);
    Route::get('/create', [UploadController::class, 'create']);
    Route::post('/', [UploadController::class, 'upload']);
    Route::prefix('/api')->group(function () {
        Route::get('/miscsales', [UploadController::class, 'miscsalesApi']);
    });
});
