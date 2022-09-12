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

Route::get('/', function() {
			return \Redirect::route('zones.index');
		   });

Route::get('/admin', 'PagesController@admin')->name('admin');
Route::get('/ack', 'PagesController@ack')->name('ack');

Route::get('/simulator', 'PagesController@loadSimulator')->name('simulator');
Route::post('/apicall', 'PagesController@callFromSimulator')->name('apicall');

Route::resource('departments', 'DepartmentsController');
Route::resource('itemCategories', 'ItemCategoriesController');
Route::resource('items', 'ItemsController');
Route::resource('registers', 'RegistersController');
Route::resource('rfidTags', 'RfidTagsController');
Route::resource('rfidReaders', 'RfidReadersController');
Route::resource('rules', 'RulesController');
Route::resource('theatres', 'TheatresController');
Route::resource('zones', 'ZonesController');
