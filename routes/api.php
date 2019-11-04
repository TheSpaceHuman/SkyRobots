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
// Validation
Route::get('validation/checkEmail', 'ApiController@checkEmail')->name('api.validation.checkEmail');

// Referrals
Route::get('referrals/binary/{id}/all', 'ApiController@referralsBinaryAll')->name('api.referrals.binary.all');
Route::get('referrals/binary/{id}', 'ApiController@referralsBinary')->name('api.referrals.binary');
Route::get('referrals/linear/{id}', 'ApiController@referralsLinear')->name('api.referrals.linear');

//
Route::post('package/update', 'ApiController@updatePackage')->name('api.updatePackage');



// Test
Route::get('test', 'ApiController@test')->name('api.test');
