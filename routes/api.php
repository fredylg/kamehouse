<?php

use Illuminate\Http\Request;
use  App\Http\Controllers\LightsController;
use  App\Http\Controllers\SonosController;
use  App\Http\Controllers\TvController;
use  App\Http\Controllers\ACController;
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

/*  --------------------- */

Route::get('/sonos/play', function (Request $request ) {
    $s = new SonosController();
    return $s->play();
});

Route::get('/sonos/pause', function (Request $request ) {
    $s = new SonosController();
    return $s->pause();
});


Route::get('/sonos/volumenup', function (Request $request ) {
    $s = new SonosController();
    return $s->volumeUp();
});

Route::get('/sonos/volumedown', function (Request $request ) {
    $s = new SonosController();
    return $s->volumeDown();
});

Route::get('/sonos/next', function (Request $request ) {
    $s = new SonosController();
    return $s->volumeDown();
});

Route::get('/sonos/previous', function (Request $request ) {
    $s = new SonosController();
    return $s->volumeDown();
});

Route::get('/sonos/setfakevolumen/{val}', function (Request $request , $val) {
    $s = new SonosController();
    return $s->setFakeVolumen( $val );
});

Route::get('/sonos/getfakevolumen', function (Request $request ) {
    $s = new SonosController();
    return $s->getFakeVolumen(  );
});

Route::get('/sonos/getvolumen', function (Request $request ) {
    $s = new SonosController();
    return $s->getVolumen(  );
});

Route::get('/sonos/getfakestatus', function (Request $request ) {
    $s = new SonosController();
    return $s->getFakeStatus();
});

Route::get('/tv/on', function (Request $request ) {
    $s = new TvController();
    return $s->on();
});

Route::get('/tv/off', function (Request $request ) {
    $s = new TvController();
    return $s->off();
});

Route::get('/tv/volumeup', function (Request $request ) {
    $s = new TvController();
    return $s->volumeUp();
});
Route::get('/tv/volumedown', function (Request $request ) {
    $s = new TvController();
    return $s->volumeDown();
});

Route::get('/tv/setvolumendown/{val}', function (Request $request , $val) {
    $s = new TvController();
    return $s->setVolumenDown($val);
});
Route::get('/tv/setvolumenup/{val}', function (Request $request , $val) {
    $s = new TvController();
    return $s->setVolumenUp($val);
});
//-------------------------------

Route::get('/ac/on', function (Request $request ) {
    $s = new ACController();
    return $s->on();
});

Route::get('/ac/off', function (Request $request ) {
    $s = new ACController();
    return $s->off();
});

Route::get('/ac/pos5', function (Request $request ) {
    $s = new ACController();
    return $s->pos5();
});

Route::get('/ac/posAuto', function (Request $request ) {
    $s = new ACController();
    return $s->posAuto();
});

Route::get('/test', function (Request $request ) {
	    die($_SERVER['SERVER_ADDR']);
});




