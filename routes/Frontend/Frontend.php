<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');



Route::get('/', 'PostsController@index')->name('index');
Route::get('/categories/{name}', 'PostCategoryController@showPostsByCategory')->name('get.postsByCategory');
Route::get('/tags/{name}', 'PostTagController@showPostsByTags')->name('get.postsByTag');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('dashboard','DashboardController@getItems')->name('dashboard');
        //Route::get('dashboard','DashboardController@showPage')->name('dashboard');

        //Route::get('pages/{slug}', 'DashboardController@showPage')->name('pages.show');
        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
       
    });

});

/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');
//
//Route::get('pages/','FrontendController@getItems');