<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('admin', 'IndexController@index')->name('login'); // for redirection purpose
            


Route::name('admin.')->group(
    function () {

        Route::get('/', 'IndexController@index');

        Route::resource('channels', 'ChannelsController');

        # to show login form
        Route::get('/auth/login', [
            'uses'  => 'Auth\LoginController@showLoginForm',
            'as'    => 'auth.login'
        ]);

        # login form submits to this route
        Route::post('/auth/login', [
            'uses'  => 'Auth\LoginController@login',
            'as'    => 'auth.login'
        ]);

        # logs out admin user
        # it was post method before I recieved MethodNotAllowedHttpException
        Route::any('/auth/logout', [
            'uses'  => 'Auth\LoginController@logout',
            'as'    => 'auth.logout'
        ]);

        # Password reset routes
        Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
        Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

        # shows dashboard
        Route::get('dashboard', [
            'uses'  => 'DashboardController@index',
            'as'    => 'dashboard.index'
        ]); 

        // Route::get('questions/details', [
        //     'uses'  => 'QuestionsController@show',
        //     'as'    => 'questions.show'
        // ]); 


    

        Route::resource('administrators', 'AdministratorsController');
        Route::resource('pages', 'PagesController'); 
        Route::resource('channels', 'ChannelsController');
        Route::resource('media-files', 'MediaFilesController');
        Route::resource('site_settings', 'SiteSettingsController');
        Route::resource('revenue-engine', 'RevenueEnginesController');
        Route::resource('profile-update', 'AdministratorsController');
        Route::resource('notifications', 'NotificationsController');
        Route::resource('messages', 'MessagesController');
        Route::resource('users', 'UsersController');
        Route::resource('plans', 'PlansController');
        Route::resource('transactions', 'TransactionsController');
        Route::resource('users-login', 'UsersLoginController');


        Route::post('hide-dashboard', 'UsersController@HideDashboard')->name('hide-dashboard');


        Route::get('edit-profile', 'AdministratorsController@EditProfile')->name('edit-profile');

        /*Route::resource('questions', 'QuestionsController');*/
        /*Route::resource('pages', 'PagesController'); 
        Route::resource('questions', 'QuestionsController');
         /*Route::resource('users', 'UsersController');
        Route::resource('notifications', 'NotificationsController');*/

        # To show change password form
        Route::get('/change-password', [
            'uses'  => 'AdministratorsController@changePassword',
            'as'    => 'users.change-password'
        ]);

        # Change password form submits to this route
        Route::post('/change-password', [
            'uses'  => 'AdministratorsController@processChangePassword',
            'as'    => 'users.change-password'
        ]);
    }
);
