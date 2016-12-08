<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', ['as' => 'gethome', 'uses' => 'HomeController@getHome']);


Route::group(['middleware' => 'web'], function () {
    Route::group(['namespace' => 'Home'],function() {
        Route::group(['prefix' => '/'],function () {
            Route::get('qho_login', ['as' => 'getLogin', 'uses' => 'Login1Controller@getLogin']);
            Route::post('qho_login', ['as' => 'postLogin', 'uses' => 'Login1Controller@postLogin']);
        });
    });
});
Route::get('logout', ['as' => 'getLogout', 'uses' => 'Home\Login1Controller@getLogout']);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'qho_admin','namespace' => 'Admin'],function() {
        Route::get('/', ['as' => 'getLogin', 'uses' => 'Login1Controller@getLogin']);
        Route::group(['prefix' => 'user'],function () {
            
            Route::get('addSV',['as' => 'getUserAddSV', 'uses' => 'UserController@getUserAddSV']);
            Route::post('addSV',['as' => 'postUserAddSV', 'uses' => 'UserController@postUserAddSV']);

            Route::get('addGV',['as' => 'getUserAddGV', 'uses' => 'UserController@getUserAddGV']);
            Route::post('addGV',['as' => 'postUserAddGV', 'uses' => 'UserController@postUserAddGV']);

            Route::get('addGVu',['as' => 'getUserAddGVu', 'uses' => 'UserController@getUserAddGVu']);
            Route::post('addGVu',['as' => 'postUserAddGVu', 'uses' => 'UserController@postUserAddGVu']);

            Route::get('list',['as' => 'getUserList', 'uses' => 'UserController@getUserList']);
            Route::get('delete/{id}',['as' => 'getUserDel', 'uses' => 'UserController@getUserDel'])->where('id', '[0-9]+');
            Route::get('edit/{id}',['as' => 'getUserEdit', 'uses' => 'UserController@getUserEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}',['as' => 'postUserEdit', 'uses' => 'UserController@postUserEdit'])->where('id', '[0-9]+');
        });

        Route::group(['prefix' => 'sinhvien'],function () {
            Route::get('add',['as' => 'getSinhvienAdd', 'uses' => 'SinhvienController@getSinhvienAdd']);
            Route::post('add',['as' => 'postSinhvienAdd', 'uses' => 'SinhvienController@postSinhvienAdd']);
            Route::get('list',['as' => 'getSinhvienList', 'uses' => 'SinhvienController@getSinhvienList']);
            Route::get('delete/{id}',['as' => 'getSinhvienDel', 'uses' => 'SinhvienController@getSinhvienDel'])->where('id', '[a-zA-Z0-9]+');
            Route::get('edit/{id}',['as' => 'getSinhvienEdit', 'uses' => 'SinhvienController@getSinhvienEdit'])->where('id', '[a-zA-Z0-9]+');
            Route::post('edit/{id}',['as' => 'postSinhvienEdit', 'uses' => 'SinhvienController@postSinhvienEdit'])->where('id', '[a-zA-Z0-9]+');
        });

        Route::group(['prefix' => 'giaovien'],function () {
            Route::get('add',['as' => 'getGiaovienAdd', 'uses' => 'GiaovienController@getGiaovienAdd']);
            Route::post('add',['as' => 'postGiaovienAdd', 'uses' => 'GiaovienController@postGiaovienAdd']);
            Route::get('list',['as' => 'getGiaovienList', 'uses' => 'GiaovienController@getGiaovienList']);
            Route::get('delete/{id}',['as' => 'getGiaovienDel', 'uses' => 'GiaovienController@getGiaovienDel'])->where('id', '[a-zA-Z0-9]+');
            Route::get('edit/{id}',['as' => 'getGiaovienEdit', 'uses' => 'GiaovienController@getGiaovienEdit'])->where('id', '[a-zA-Z0-9]+');
            Route::post('edit/{id}',['as' => 'postGiaovienEdit', 'uses' => 'GiaovienController@postGiaovienEdit'])->where('id', '[a-zA-Z0-9]+');
        });

        Route::group(['prefix' => 'giaovu'],function () {
            Route::get('add',['as' => 'getGiaovuAdd', 'uses' => 'GiaovuController@getGiaovuAdd']);
            Route::post('add',['as' => 'postGiaovuAdd', 'uses' => 'GiaovuController@postGiaovuAdd']);
            Route::get('list',['as' => 'getGiaovuList', 'uses' => 'GiaovuController@getGiaovuList']);
            Route::get('delete/{id}',['as' => 'getGiaovuDel', 'uses' => 'GiaovuController@getGiaovuDel'])->where('id', '[a-zA-Z0-9]+');
            Route::get('edit/{id}',['as' => 'getGiaovuEdit', 'uses' => 'GiaovuController@getGiaovuEdit'])->where('id', '[a-zA-Z0-9]+');
            Route::post('edit/{id}',['as' => 'postGiaovuEdit', 'uses' => 'GiaovuController@postGiaovuEdit'])->where('id', '[a-zA-Z0-9]+');
        });

        
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'qho_sinhvien','namespace' => 'Sinhvien'],function() {
        Route::get('/', ['as' => 'getLogin', 'uses' => 'Login1Controller@getLogin']);
        route::group(['prefix' => 'sinhvien'], function() {
            route::get('nhom',['as' => 'getNhom', 'uses' => 'NhomController@getNhom']);
            route::post('nhom',['as' => 'postNhom', 'uses' => 'NhomController@postNhom']);
            route::get('nhomSV',['as' => 'getNhomSV', 'uses' => 'NhomController@getNhomSV']);
            route::get('listnhom',['as' => 'listNhom', 'uses' => 'NhomController@listNhom']);
            route::get('listdetai',['as' => 'listDetai', 'uses' => 'NhomController@listDetai']);
            route::get('addmember',['as' => 'addMember', 'uses' => 'NhomController@addMember']);
            route::get('addDetai',['as' => 'addDetai', 'uses' => 'NhomController@addDetai']);
            Route::get('delete/{id}',['as' => 'getSVDel', 'uses' => 'NhomController@getSVDel'])->where('id', '[a-zA-Z0-9]+');
        });

    });
});


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'qho_giaovien','namespace' => 'Giaovien'],function() {
        Route::get('/', ['as' => 'getLogin', 'uses' => 'Login1Controller@getLogin']);
        Route::group(['prefix' => 'detai'],function () {

            Route::get('addTT',['as' => 'getDetaiTTAdd', 'uses' => 'DetaiController@getDetaiTTAdd']);
            Route::post('addTT',['as' => 'postDetaiTTAdd', 'uses' => 'DetaiController@postDetaiTTAdd']);

            Route::get('add',['as' => 'getDetaiAdd', 'uses' => 'DetaiController@getDetaiAdd']);
            Route::post('add',['as' => 'postDetaiAdd', 'uses' => 'DetaiController@postDetaiAdd']);
            Route::get('listTT',['as' => 'getDetaiTTList', 'uses' => 'DetaiController@getDetaiTTList']);
            Route::get('listLV',['as' => 'getDetaiLVList', 'uses' => 'DetaiController@getDetaiLVList']);
            Route::get('delete/{id}',['as' => 'getDetaiDel', 'uses' => 'DetaiController@getDetaiDel'])->where('id', '[a-zA-Z0-9]+');
            Route::get('edit/{id}',['as' => 'getDetaiEdit', 'uses' => 'DetaiController@getDetaiEdit'])->where('id', '[a-zA-Z0-9]+');
            Route::post('edit/{id}',['as' => 'postDetaiEdit', 'uses' => 'DetaiController@postDetaiEdit'])->where('id', '[a-zA-Z0-9]+');
        });

    });
});