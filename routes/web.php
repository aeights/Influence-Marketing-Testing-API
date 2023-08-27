<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('daftar',[AuthController::class,'daftar']);

Route::get('login',[AuthController::class,'login']);
Route::get('/redirect',[AuthController::class,'googleRedirect']);
Route::get('/callback',[AuthController::class,'googleCallback']);

Route::get('/instagram/redirect',[AuthController::class,'instagramRedirect']);
Route::get('/instagram/callback',[AuthController::class,'instagramCallback']);

Route::get('/youtube', function () {
    $channel_username = "motogp";
    $api_key = "AIzaSyA3Ups926TL5ZStFp-KezyNj23yJuvffmg";
    // $channel_id = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=id&forUsername='.$channel_username.'&key='.$api_key);
    // $api_response = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=id,statistics&id='.json_decode($channel_id,true)['items'][0]['id'].'&key='.$api_key);
    // $api_response = file_get_contents('https://youtube.googleapis.com/youtube/v3/search?part=snippet&q=WindahBasudara&type=username&key='.$api_key);
    $api_response = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=id,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key='.$api_key);
    $api_response_decoded = json_decode($api_response, true);
    dd($api_response_decoded);
});