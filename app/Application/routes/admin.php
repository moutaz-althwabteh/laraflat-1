<?php
Route::get('icons' , 'HomeController@icons');
Route::get('docs' , 'HomeController@apiDocs');
#### user control
Route::get('user' , 'UserController@index');
Route::get('user/item/{id?}' , 'UserController@show');
Route::post('user/item/{id?}' , 'UserController@store');
Route::get('user/{id}/delete' , 'UserController@destroy');
Route::get('user/{id}/view' , 'UserController@getById');
#### group control
Route::get('group' , 'GroupController@index');
Route::get('group/item/{id?}' , 'GroupController@show');
Route::post('group/item/{id?}' , 'GroupController@store');
Route::get('group/{id}/delete' , 'GroupController@destroy');
Route::get('group/{id}/view' , 'GroupController@getById');
#### role control
Route::get('role' , 'RoleController@index');
Route::get('role/item/{id?}' , 'RoleController@show');
Route::post('role/item/{id?}' , 'RoleController@store');
Route::get('role/{id}/delete' , 'RoleController@destroy');
Route::get('role/{id}/view' , 'RoleController@getById');
#### permission control
Route::get('permission' , 'PermissionController@index');
Route::get('permission/item/{id?}' , 'PermissionController@show');
Route::post('permission/item/{id?}' , 'PermissionController@store');
Route::get('permission/{id}/delete' , 'PermissionController@destroy');
Route::get('permission/{id}/view' , 'PermissionController@getById');
#### home control
Route::get('home/{pages?}/{limit?}' , 'HomeController@index');
#### setting control
Route::get('setting' , 'SettingController@index');
Route::get('setting/item/{id?}' , 'SettingController@show');
Route::post('setting/item/{id?}' , 'SettingController@store');
Route::get('setting/{id}/delete' , 'SettingController@destroy');
Route::get('setting/{id}/view' , 'SettingController@getById');
#### menu control
Route::get('menu' , 'MenuController@index');
Route::get('menu/item/{id?}' , 'MenuController@show');
Route::post('menu/item/{id?}' , 'MenuController@store');
Route::get('menu/{id}/delete' , 'MenuController@destroy');
Route::get('menu/{id}/view' , 'MenuController@getById');
Route::post('update/menuItem' , 'MenuController@menuItem');
Route::post('addNewItemToMenu' , 'MenuController@addNewItemToMenu');
Route::get('deleteMenuItem/{id}' , 'MenuController@deleteMenuItem');
Route::get('getItemInfo/{id}' , 'MenuController@getItemInfo');
Route::post('updateOneMenuItem' , 'MenuController@updateOneMenuItem');


#### page control
Route::get('page' , 'PageController@index');
Route::get('page/item/{id?}' , 'PageController@show');
Route::post('page/item/{id?}' , 'PageController@store');
Route::get('page/{id}/delete' , 'PageController@destroy');
Route::get('page/{id}/view' , 'PageController@getById');
#### log control
Route::get('log' , 'LogController@index');
Route::get('log/item/{id?}' , 'LogController@show');
Route::post('log/item/{id?}' , 'LogController@store');
Route::get('log/{id}/delete' , 'LogController@destroy');
Route::get('log/{id}/view' , 'LogController@getById');
#### categorie control
Route::get('categorie' , 'CategorieController@index');
Route::get('categorie/item/{id?}' , 'CategorieController@show');
Route::post('categorie/item/{id?}' , 'CategorieController@store');
Route::get('categorie/{id}/delete' , 'CategorieController@destroy');
Route::get('categorie/{id}/view' , 'CategorieController@getById');


#### country control
Route::get('country' , 'CountryController@index');
Route::get('country/item/{id?}' , 'CountryController@show');
Route::post('country/item/{id?}' , 'CountryController@store');
Route::get('country/{id}/delete' , 'CountryController@destroy');
Route::get('country/{id}/view' , 'CountryController@getById');
#### state control
Route::get('state' , 'StateController@index');
Route::get('state/item/{id?}' , 'StateController@show');
Route::post('state/item/{id?}' , 'StateController@store');
Route::get('state/{id}/delete' , 'StateController@destroy');
Route::get('state/{id}/view' , 'StateController@getById');


//moutaz ajax
Route::get('getUser' , 'ProductController@getUser');
Route::get('getState/{id}','ProductController@getState');
#### contact control
Route::get('contact' , 'ContactController@index');
Route::get('contact/item/{id?}' , 'ContactController@show');
Route::post('contact/item/{id?}' , 'ContactController@store');
Route::get('contact/{id}/delete' , 'ContactController@destroy');
Route::get('contact/{id}/view' , 'ContactController@getById');
#### advertisement control
Route::get('advertisement' , 'AdvertisementController@index');
Route::get('advertisement/item/{id?}' , 'AdvertisementController@show');
Route::post('advertisement/item/{id?}' , 'AdvertisementController@store');
Route::get('advertisement/{id}/delete' , 'AdvertisementController@destroy');
Route::get('advertisement/{id}/view' , 'AdvertisementController@getById');