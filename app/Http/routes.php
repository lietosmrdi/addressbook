<?php

Route::get('/', 'HomepageController@index');
Route::post('/', 'HomepageController@store');
Route::put('/contact/{contact}', 'HomepageController@update');
Route::delete('/contact/{contact}', 'HomepageController@destroy');