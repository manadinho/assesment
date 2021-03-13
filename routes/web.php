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

Route::get('/', 'HomeController@index')->name('/');

Route::group(['middleware' => 'auth'],function(){

    Route::get('logout','Auth\AuthenticatedSessionController@logout')->name('logout');

    Route::group(['prefix' => 'super', 'as' => 'super-dashboard-', 'middleware' => ['check.type:super_admin']], function(){

        Route::get('/super-dashboard','SuperAdminController@index')->name('index');
        Route::get('/get-all-users', 'SuperAdminController@allUsers')->name('all-users');
        Route::get('/delete', 'SuperAdminController@delete')->name('delete-user');
        Route::get('/add/{id}', 'SuperAdminController@addUser')->name('add-user-view');
        Route::post('/add', 'SuperAdminController@addUpdateUser')->name('add-user');
        Route::get('/impersonate/{id}', 'SuperAdminController@impersonate')->name('impersonate');

    });

    Route::group(['prefix' => '/admin', 'as' => 'admin-dashboard-' , 'middleware' => ['check.type:admin']], function(){
        Route::get('/admin-dashboard','AdminController@index')->name('index');
    });
    
    Route::group(['prefix' => '/user', 'as' => 'user-dashboard-', 'middleware' => ['check.type:user']], function(){
        Route::get('/user-dashboard','UserController@index')->name('index');
    });
    
    Route::get('/leave-impersonate', 'SuperAdminController@LeaveImpersonate')->name('leave-impersonate');
    Route::get('/posts', 'PostsController@index')->name('posts');
});

View::composer(['*'], function($view){
    $languages = [];
    $segments = request()->segments(1);
    $queryParams = explode('?', request()->fullUrl());

    foreach(cache('LANGUAGES') as $lang) {
        $segments[0] = $lang['short_code'];
        $languages[$lang['short_code']] = [
            'title' => $lang['title'],
            'url' => url(implode('/', $segments). ((count($queryParams) > 1) ? '?'.$queryParams[1]:''))
        ];
    }
    $view->with('languages', $languages);
});

require __DIR__.'/auth.php';
