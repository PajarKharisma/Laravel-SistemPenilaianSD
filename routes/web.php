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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index');
Route::get('/user/daftar/{menu}', 'UserController@indexMenu');
Route::get('/tahunajaran', 'TahunAjaranController@index');
Route::get('/semester', 'SemesterController@index');
Route::get('/guru', 'GuruController@index');
Route::get('/siswa', 'SiswaController@index');
Route::get('/kelas', 'KelasController@index');
Route::get('/mapel', 'MapelController@index');
Route::get('/mapel/daftar/{menu}', 'MapelController@indexMenu');

AdvancedRoute::controllers([
    '/user' => 'UserController',
    '/tahunajaran' => 'TahunAjaranController',
    '/semester' => 'SemesterController',
    '/guru' => 'GuruController',
    '/siswa' => 'SiswaController',
    '/mapel' => 'MapelController',
    '/kelas' => 'KelasController'
]);

Auth::routes();
