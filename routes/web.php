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

Route::get('/', 'HomeController@home');
Route::get('/group-contacts', 'GroupContactsController@index');
Route::delete('/group-contacts/{group}/delete/{contact}', 'GroupContactsController@destroy');
Route::get('/update/{contact}', 'GroupContactsController@show');

Route::group(['prefix' => 'contacts'], function () {
    Route::get('create/{contactId?}/group/{groupId?}', 'ContactsController@show');
    Route::post('create', 'ContactsController@create');
    Route::post('update/{contact}', 'ContactsController@edit');
    Route::get('read/{contact}', 'ContactsController@read');
});

