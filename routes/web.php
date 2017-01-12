<?php

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Home Page
Route::get('/', 'HomeController@showHome');

// Dashboard
Route::get('dashboard', 'DashboardController@showDashboard');
Route::get('repos', 'DashboardController@reposPage');
Route::get('repo/{id}', 'DashboardController@repoPage');

// Sync
Route::get('repos/sync', 'GithubController@syncRepos');
Route::get('repo/{id}/sync', 'GithubController@syncMetrics');

// Authentication
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@authorizeUser');
Route::get('callback', 'LoginController@loginUser');

// Work in Progress
Route::get('wip', function () {
    return 'This part of the site is not available yet. Come back later!';
});

// Errors
Route::get('404', function () {
    return 'Error 404 Not Found';
});
