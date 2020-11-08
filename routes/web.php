<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'FrontController@index');
Route::get('/{tid}-{aid?}', 'FrontController@mainpage')->name('mainpage');

// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create/{Aid}', 'Admin\PeopleController@create');
Route::post('/create/{Aid}', 'Admin\PeopleController@store');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
      Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('people')->name('people/')->group(static function() {
            Route::get('/',                                             'PeopleController@index')->name('index');
            Route::get('/{person}/edit',                                'PeopleController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PeopleController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{person}',                                    'PeopleController@update')->name('update');
            Route::delete('/{person}',                                  'PeopleController@destroy')->name('destroy');
        });
       Route::prefix('arrivals')->name('arrivals/')->group(static function() {
            Route::get('/',                                             'ArrivalController@index')->name('index');
            Route::get('/create',                                       'ArrivalController@create')->name('create');
            Route::post('/',                                            'ArrivalController@store')->name('store');
            Route::get('/{arrival}/edit',                               'ArrivalController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ArrivalController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{arrival}',                                   'ArrivalController@update')->name('update');
            Route::delete('/{arrival}',                                 'ArrivalController@destroy')->name('destroy');
        });
        Route::prefix('tours')->name('tours/')->group(static function() {
            Route::get('/',                                             'ToursController@index')->name('index');
            Route::get('/create',                                       'ToursController@create')->name('create');
            Route::post('/',                                            'ToursController@store')->name('store');
            Route::get('/{tour}/edit',                                  'ToursController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ToursController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tour}',                                      'ToursController@update')->name('update');
            Route::delete('/{tour}',                                    'ToursController@destroy')->name('destroy');
        });
    });

});