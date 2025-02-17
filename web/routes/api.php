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
//Route::prefix('v1')->group(function() {
//
//    Route::prefix('auth')->group(function() {
//
//        // Below mention routes are public, user can access those without any restriction.
//        // Create New User
//        Route::post('register', 'API\AuthController@register');
//        // Login User
//        Route::post('login', 'API\AuthController@login');
//
//        // Refresh the JWT Token
//        Route::get('refresh', 'API\AuthController@refresh');
//
//        // Below mention routes are available only for the authenticated users.
//        Route::middleware('auth:api')->group(function () {
//            // Get user info
//            Route::get('user', 'API\AuthController@user');
//            // Logout user from application
//            Route::post('logout', 'API\AuthController@logout');
//
//        });
//    });
//});
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['prefix' => 'auth'], function($api) {
        // Below mention routes are public, user can access those without any restriction.
        // Create New User
        $api->post('register', 'App\Http\Controllers\API\V1\AuthController@register');
        // Login User
        $api->post('login', 'App\Http\Controllers\API\V1\AuthController@login');

        // Refresh the JWT Token
        $api->get('refresh', 'App\Http\Controllers\API\V1\AuthController@refresh');

        // Below mention routes are available only for the authenticated users.
        $api->group(['middleware' => 'auth:api'], function($api) {
            // Get user info
            $api->get('user', 'App\Http\Controllers\API\V1\AuthController@user');
            // Logout user from application
            $api->post('logout', 'App\Http\Controllers\API\V1\AuthController@logout');

        });
    });

});
