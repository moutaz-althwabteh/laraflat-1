<?php

Route::get('/', 'HomeController@welcome');

Route::get('/page/{slug}', 'HomeController@getPageBySlug');

// socializ
Route::get('auth/{provider}', 'HomeController@redirectToProvider');
Route::get('auth/{provider}/callback', 'HomeController@handleProviderCallback');

Auth::routes();
