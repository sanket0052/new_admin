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
    return \Auth::check() == true ? redirect('home') : view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('auth/logout', 'AuthController@logout');

Route::auth();

Route::group([
        'prefix' => 'admin',
        'middleware' => 'auth',
        'namespace' => 'Admin',
    ], function () {

      Route::get('home', 'DashboardController@index');

      Route::get('user/get-data', ['as' => 'admin.user.getData', 'uses' => 'UserController@getData']);
      Route::resource('user', 'UserController');

      Route::get('role/get-data', ['as' => 'admin.role.getData', 'uses' => 'RoleController@getData']);
      Route::resource('role', 'RoleController');

      Route::get('company/get-data', ['as' => 'admin.company.getData', 'uses' => 'CompanyController@getData']);
      Route::resource('company', 'CompanyController');

      Route::get('report-listing/get-data', ['as' => 'admin.report-listing.getData', 'uses' => 'ReportListingController@getData']);
      Route::resource('report-listing', 'ReportListingController');

      Route::get('report/view/{type}/{file}', ['as' => 'admin.reports.view', 'uses' => 'ReportsController@viewReports']);
      Route::get('report/{type}', ['as' => 'admin.reports', 'uses' => 'ReportsController@reports']);
      Route::resource('reports', 'ReportsController');
});
