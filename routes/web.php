<?php

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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/controller/1700/ON', function () {
    die('1');
});
Route::get('/controller/1700/OFF', function () {
    die('1');
});
Route::get('/status/100059', function () {
    die('1');
});
Route::get('/status/100054', function () {
    die('123');
});
Route::get('/status', function () {
    die('ok3');
});
