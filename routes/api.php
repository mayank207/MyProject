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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
// });
Route::group(['middleware'=>'auth:api'],function(){
    Route::resource('inter','api\InterController');
    Route::resource('tech','api\TechController');
    Route::resource('hr','api\HrController');



        Route::get('plogout', 'AuthController@logout');
        Route::get('puser', 'AuthController@user');
      });


    Route::post('Passlogin', 'AuthController@login');
    Route::post('sup', 'AuthController@signup');
 