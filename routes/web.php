<?php

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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [
    'as'    =>  'public.home',
    'uses'  =>  'Frontend\MainController@home'
]);

Route::get('/guides', [
    'as'    =>  'public.guides',
    'uses'  =>  'Frontend\MainController@guides'
]);
Route::get('/guides/{slug}', [
    'as'    =>  'public.guides.byCategory',
    'uses'  =>  'Frontend\PostsController@byCategory'
]);
Route::get('/guides/{category}/{slug}', [
    'as'    =>  'public.guides.show',
    'uses'  =>  'Frontend\PostsController@showPost'
]);

Route::get('/clan', [
    'as'    =>  'public.clan',
    'uses'  =>  'Frontend\MainController@clan'
]);

Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('public/' . $filename))->response();
});

Route::group(['middleware' => ['auth','verified'], 'prefix' => 'admin'], function () {
    Route::prefix('dashboard')->group( function () {
        Route::get('/', [
            'as'    =>  'admin.dashboard.index',
            'uses'  =>  'Backend\DashboardController@index'
        ]);
    });
    Route::prefix('guides')->group( function () {
        Route::get('/', [
            'as'    =>  'admin.guides.index',
            'uses'  =>  'Backend\PostController@index'
        ]);
        Route::get('/create', [
            'as'    =>  'admin.guides.create',
            'uses'  =>  'Backend\PostController@create'
        ]);
        Route::post('/store', [
            'as'    =>  'admin.guides.store',
            'uses'  =>  'Backend\PostController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'    =>  'admin.guides.edit',
            'uses'  =>  'Backend\PostController@edit'
        ]);
        Route::put('/update/{id}', [
            'as'    =>  'admin.guides.update',
            'uses'  =>  'Backend\PostController@update'
        ]);
        Route::delete('/delete/{id}', [
            'as'    =>  'admin.guides.delete',
            'uses'  =>  'Backend\PostController@destroy'
        ]);
    });
    Route::prefix('categories')->group( function () {
        Route::get('/', [
            'as'    =>  'admin.categories.index',
            'uses'  =>  'Backend\CategoryController@index'
        ]);
        Route::get('/create', [
            'as'    =>  'admin.categories.create',
            'uses'  =>  'Backend\CategoryController@create'
        ]);
        Route::post('/store', [
            'as'    =>  'admin.categories.store',
            'uses'  =>  'Backend\CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'    =>  'admin.categories.edit',
            'uses'  =>  'Backend\CategoryController@edit'
        ]);
        Route::put('/update/{id}', [
            'as'    =>  'admin.categories.update',
            'uses'  =>  'Backend\CategoryController@update'
        ]);
        Route::delete('/delete/{id}', [
            'as'    =>  'admin.categories.delete',
            'uses'  =>  'Backend\CategoryController@destroy'
        ]);
    });
    Route::prefix('tags')->group( function () {
        Route::get('/', [
            'as'    =>  'admin.tags.index',
            'uses'  =>  'Backend\TagController@index'
        ]);
        Route::get('/create', [
            'as'    =>  'admin.tags.create',
            'uses'  =>  'Backend\TagController@create'
        ]);
        Route::post('/store', [
            'as'    =>  'admin.tags.store',
            'uses'  =>  'Backend\TagController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'    =>  'admin.tags.edit',
            'uses'  =>  'Backend\TagController@edit'
        ]);
        Route::put('/update/{id}', [
            'as'    =>  'admin.tags.update',
            'uses'  =>  'Backend\TagController@update'
        ]);
        Route::delete('/delete/{id}', [
            'as'    =>  'admin.tags.delete',
            'uses'  =>  'Backend\TagController@destroy'
        ]);
    });
});
