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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify'=>true]);


// Route::group(['middleware' => ['auth','verified']], function () {

    // Route::post('/login', 'Auth\LoginController@guest')->name('guest');

    Route::resource('home', 'HomeController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/components', function(){
        return view('components');
    })->name('components');

    Route::get('/about', function(){
        return view('about');
    })->name('about');

    Route::get('/politica',function(){
        return view('privacy');
    })->name('politica-privacidad');

    Route::get('/datos',function(){
        return view('use-policy');
    })->name('politica-datos');

    Route::get('/novedades',function(){
        return view('developments');
    })->name('novedades');

    Route::get('/version',function(){
        return view('version');
    })->name('version');

    Route::resource('users', 'UserController');

    Route::get('/profile/{user}', 'UserController@profile')->name('profile.edit');

    Route::post('/profile/{user}', 'UserController@profileUpdate')->name('profile.update');

    Route::resource('roles', 'RoleController')->except('show');

    Route::resource('permissions', 'PermissionController')->except(['show','destroy','update']);

    Route::resource('project', 'ProjectController');

    Route::post('/project/{id}', 'ProjectController@updateAll');

   


    Route::resource('post', 'PostController');   

    Route::get('/post/{id_project}', ["uses" => 'PostController@index',"as" => 'single' ])->name('post.index');

    Route::get('/activity-log', 'SettingController@activity')->name('activity-log.index');

    Route::get('/settings', 'SettingController@index')->name('settings.index');

    Route::post('/post/{id_post}', 'PostController@show_post')->name('show_post');

    Route::post('/settings', 'SettingController@update')->name('settings.update');


    Route::get('media', function (){
        return view('media.index');
    })->name('media.index');
// });
