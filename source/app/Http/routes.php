<?php

Route::get('/', 'Auth\AuthController@getLogin');

Route::group(['namespace' => 'Auth',], function () {
    Route::get('login', [
        'uses' => 'AuthController@getLogin',
        'as' => 'login'
    ]);
    Route::post('login', [
        'uses' => 'AuthController@postLogin',
        'as' => 'login'
    ]);
    Route::post('', [
        'uses' => 'AuthController@postLogin',
        'as' => 'login'
    ]);
});
 

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('resetPassword', 'Admin\UtilsController@resetPassword');

Route::get('docWservice', ['middleware' => 'auth.basic.once', function() {
        return view('doc-web-service.doc.api');
    }]);

Route::group(['middleware' => ['auth', 'roles'],
    'namespace' => 'Admin',
    'prefix' => 'admpanel'], function () {
    // Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'homeadmin']);
    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'homeadmin']);
    Route::group(['roles' => 'user_admin'], function () {
        Route::controllers([
            'admin' => 'AdminController'
        ]);
    });
    Route::group(['roles' => ['user_admin', 'user_content']], function () {
        Route::controllers([
            'category' => 'CategoryController',
            'publication' => 'PublicationController',
			'publication-complaints' => 'PublicationComplaintsController',
            'provider' => 'ProviderController',
			'provider-waiting' => 'ProviderWaitingController',
            'auth' => 'AuthController',
			'configuration' => 'ConfigurationController',
            'user' => 'UserController'
        ]);
    });
});

Route::group(['namespace' => 'Wservice', 'prefix' => 'wservice'], function () {
    Route::resource('user', 'UserController');
    Route::resource('register', 'RegisterController');
    Route::resource('login', 'LoginController');
    Route::resource('logout', 'LogoutController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('providers', 'ProvidersController');
    Route::resource('publication-for-user', 'PublicationForUserController');
    Route::resource('publication', 'PublicationController');
    Route::resource('comment-provider', 'CommentProviderController');
    Route::resource('comment-publication', 'CommentPublicationController');
    Route::resource('like-publication', 'LikePublicationController');
    Route::resource('register-alternative', 'LoginAlternoController');
	Route::resource('register-friends', 'FriendsController');
});
