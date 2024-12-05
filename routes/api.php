<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/getUsers', [TestController::class, 'getUsers']);
Route::get('/getUser/{id}', [TestController::class, 'getUser']);
Route::post('/insertUser', [TestController::class, 'insertUser']);
Route::put('/updateUser/{id}', [TestController::class, 'updateUser']);


Route::get('/getDatosArchivo', [TestController::class, 'getDatosArchivo']);
Route::get('/getDatosArchivoID/{id}', [TestController::class, 'getDatosArchivoID']);
Route::post('/insertDatosArchivo', [TestController::class, 'insertDatosArchivo']);
Route::put('/updateDatosArchivo/{id}', [TestController::class, 'updateDatosArchivo']);



Route::get('/getProducts', [TestController::class, 'getProducts']);
Route::get('/getProduct/{id}', [TestController::class, 'getProduct']);
Route::post('/insertProduct', [TestController::class, 'insertProduct']);
Route::put('/updateProduct/{id}', [TestController::class, 'updateProduct']);
Route::delete('/deleteProduct/{id}', [TestController::class, 'deleteProduct']);