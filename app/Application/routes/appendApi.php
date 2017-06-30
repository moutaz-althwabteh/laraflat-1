<?php

#user
Route::post('users/login' , 'UserApi@login');
Route::get('users/getById/{id}', 'UserApi@getById');
Route::get('users/delete/{id}', 'UserApi@delete');
Route::post('users/add', 'UserApi@add');
Route::post('users/update', 'UserApi@update');
Route::get('users/{limit?}/{offset?}', 'UserApi@index');

#page
Route::get('page/getById/{id}/{lang?}', 'PageApi@getById');
Route::get('page/delete/{id}', 'PageApi@delete');
Route::post('page/add', 'PageApi@add');
Route::post('page/update/{id}', 'PageApi@update');
Route::get('page/{limit?}/{offset?}/{lang?}', 'PageApi@index');


#categorie
Route::get('categorie/getById/{id}/{lang?}', 'CategorieApi@getById');
Route::get('categorie/delete/{id}', 'CategorieApi@delete');
Route::post('categorie/add', 'CategorieApi@add');
Route::post('categorie/update/{id}', 'CategorieApi@update');
Route::get('categorie/{limit?}/{offset?}/{lang?}', 'CategorieApi@index');


#country
Route::get('country/getById/{id}/{lang?}', 'CountryApi@getById');
Route::get('country/delete/{id}', 'CountryApi@delete');
Route::post('country/add', 'CountryApi@add');
Route::post('country/update/{id}', 'CountryApi@update');
Route::get('country/{limit?}/{offset?}/{lang?}', 'CountryApi@index');

#state
Route::get('state/getById/{id}/{lang?}', 'StateApi@getById');
Route::get('state/delete/{id}', 'StateApi@delete');
Route::post('state/add', 'StateApi@add');
Route::post('state/update/{id}', 'StateApi@update');
Route::get('state/{limit?}/{offset?}/{lang?}', 'StateApi@index');

#product
Route::get('product/getById/{id}/{lang?}', 'ProductApi@getById');
Route::get('product/delete/{id}', 'ProductApi@delete');
Route::post('product/add', 'ProductApi@add');
Route::post('product/update/{id}', 'ProductApi@update');
Route::get('product/{limit?}/{offset?}/{lang?}', 'ProductApi@index');

#contact
Route::get('contact/getById/{id}/{lang?}', 'ContactApi@getById');
Route::get('contact/delete/{id}', 'ContactApi@delete');
Route::post('contact/add', 'ContactApi@add');
Route::post('contact/update/{id}', 'ContactApi@update');
Route::get('contact/{limit?}/{offset?}/{lang?}', 'ContactApi@index');

#advertisement
Route::get('advertisement/getById/{id}/{lang?}', 'AdvertisementApi@getById');
Route::get('advertisement/delete/{id}', 'AdvertisementApi@delete');
Route::post('advertisement/add', 'AdvertisementApi@add');
Route::post('advertisement/update/{id}', 'AdvertisementApi@update');
Route::get('advertisement/{limit?}/{offset?}/{lang?}', 'AdvertisementApi@index');