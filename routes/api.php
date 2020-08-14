<?php

use Illuminate\Http\Request;

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

Route::post('v1/access/token', 'Admin\MpesaController@generateAccessToken');
Route::post('v1/icashers/stk/push', 'Admin\MpesaController@customerMpesaSTKPush');
Route::post('v1/icashers/validation', 'Admin\MpesaController@mpesaValidation');
Route::post('v1/icashers/transaction/confirmation', 'Admin\MpesaController@mpesaConfirmation');
Route::post('v1/icashers/register/url', 'Admin\MpesaController@mpesaRegisterUrls');
