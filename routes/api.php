<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//function area
Route::get("/afarea","function_areacontroller@index");
Route::get("/afarea/{id}","function_areacontroller@fAreaByid");
Route::post("/afarea","function_areacontroller@save");
Route::put("/afarea/{id}","function_areacontroller@fAreaUpdate");
Route::delete("/afarea/{id}","function_areacontroller@fAreaDestroy");

//Igmetric
Route::get("/ametric","igmetriccontroller@index");
Route::get("/ametric/{id}","igmetriccontroller@igMetricByid");
Route::post("/ametric","igmetriccontroller@save");
Route::put("/ametric/{id}","igmetriccontroller@igMetricUpdate");
Route::delete("/ametric/{id}","igmetriccontroller@igMetricDestroy");