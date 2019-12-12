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
Route::delete('/group-contacts/{group}/contacts/{contact}/delete', 'GroupContactsController@destroy');
Route::get('/update/{contact}', 'GroupContactsController@show');
Route::get('groups/{groupId}/contacts', 'ContactsController@show');

Route::group(['prefix' => 'contacts'], function () {
    Route::get('edit/{contact?}/group/{groupId?}', 'GroupContactsController@show');
    Route::post('create', 'ContactsController@create');
    Route::put('update/{contact}', 'ContactsController@edit');
    Route::get('{contact}/readNote', 'ContactsController@read');
});

