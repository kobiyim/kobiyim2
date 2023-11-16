<?php

/*
|--------------------------------------------------------------------------
| Kobiyim
|--------------------------------------------------------------------------
|
| @version v1.0.0
|
*/

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('kobiyim', 'SystemController@kobiyim')->name('kobiyim');

    Route::group([
        'prefix' => 'system',
    ], function () {
        Route::group([
            'prefix' => 'activity',
        ], function () {
            Route::get('/', 'ActivityController@index')->name('activity');
            Route::get('json', 'ActivityController@json')->name('activity.json');
        });

        Route::get('user/json', 'UserController@json')->name('user.json');

        Route::get('user/{id}/permission', 'UserController@permission')->name('user.permission');
        Route::post('user/{id}/permission', 'UserController@savePermission');

        Route::group([
            'prefix' => 'user',
        ], function () {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('json', 'UserController@json')->name('user.json');
            Route::post('/', 'UserController@store')->name('user.store');
            Route::put('{id}', 'UserController@update')->name('user.update');
            Route::delete('{id}', 'UserController@destroy')->name('user.destroy');
        });

        Route::group([
            'prefix' => 'permission',
        ], function () {
            Route::get('/', 'PermissionController@index')->name('permission.index');
            Route::get('json', 'PermissionController@json')->name('permission.json');
            Route::post('/', 'PermissionController@store')->name('permission.store');
            Route::put('{id}', 'PermissionController@update')->name('permission.update');
            Route::delete('{id}', 'PermissionController@destroy')->name('permission.destroy');
        });
    });

    Route::post('modals', '\App\Http\Controllers\ModalsController@__invoke')->name('modals');
});

Route::group(['namespace' => '\Kobiyim\Auth\Http\Controllers'], function () {
    // Authentication...
    Route::get('login', 'AuthenticatedSessionController@create')
        ->middleware(['guest'])
        ->name('login');

    Route::post('login', 'AuthenticatedSessionController@store')
        ->middleware([
            'guest',
        ]);

    Route::post('logout', 'AuthenticatedSessionController@destroy')
        ->name('logout');

    Route::get('forgot-password', 'PasswordResetLinkController@create')
        ->middleware('guest')
        ->name('password.request');

    Route::get('reset-password', 'NewPasswordController@create')
        ->middleware('guest')
        ->name('password.reset');

    Route::post('forgot-password', 'PasswordResetLinkController@store')
        ->middleware('guest')
        ->name('password.send');

    Route::post('reset-password', 'NewPasswordController@store')
        ->middleware('guest')
        ->name('password.update');

    // Registration...
    Route::get('register', 'RegisteredUserController@create')
        ->middleware('guest')
        ->name('register');

    Route::post('register', 'RegisteredUserController@store')
        ->middleware('guest');
});
