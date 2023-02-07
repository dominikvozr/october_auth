<?php

use Dondo\Auth\Handlers\AuthHandler;
// use Laravel\Fortify\Features;

// Features::registration();
// Features::resetPasswords();
// Features::emailVerification();

//Route::get('getdata', [AuthHandler::class, 'getDataMock']);
Route::post('register', [AuthHandler::class, 'register']);
Route::group(['middleware' => 'RainLab\User\Classes\AuthMiddleware'], function() {
	Route::post('logout', [AuthHandler::class, 'logout']);
});
Route::get('check-authorization', [AuthHandler::class, 'checkAuthorization']);
Route::post('login', [AuthHandler::class, 'login']);