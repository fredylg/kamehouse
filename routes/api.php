<?php

use Illuminate\Http\Request;
use  App\Http\Controllers\LightsController;
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
Route::get('/light/getStatus/{id}', function (Request $request , $id) {
    $s = new LightsController($id);
    return $s->getLightStatus();
});

Route::get('/light/setStatus/{id}/{status}', function (Request $request , $id ,$status) {
    $s = new LightsController($id);
    return $s->setLightStatus($status);
});
Route::get('/light/setLightValue/{id}/{status}', function (Request $request , $id ,$status) {
    $s = new LightsController($id);
    return $s->setLightValue($status);
});
Route::get('/light/getLightValue/{id}', function (Request $request , $id ) {
    $s = new LightsController($id);
    return $s->getLightValue();
});
