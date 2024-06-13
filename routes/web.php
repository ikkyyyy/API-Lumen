<?php

$router->get('/ ', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'cors'], function ($router){
    $router->post('/login', 'AuthController@login');
    $router->get('/logout', 'AuthController@logout');
    $router->get('/profile', 'AuthController@me');

$router->group(['prefix' => 'stuff/'], function() use ($router) {

    $router->get('/', 'StuffController@index');
    $router->post('/store', 'StuffController@store');
    $router->get('/trash', 'StuffController@trash');
    $router->get('{id}', 'StuffController@show');
    $router->put('/update/{id}', 'StuffController@update');
    $router->delete('/delete/{id}', 'StuffController@destroy');
    $router->get('/restore/{id}', 'StuffController@restore');
    $router->delete('/permanent/{id}', 'StuffController@deletePermanent');
    
});

$router->group(['prefix' => 'user'], function() use ($router) {
    $router->post('/store', 'UserController@store');
    $router->get('/', 'UserController@index');
    $router->post('/create  ', 'UserController@index');
 });

$router->group(['prefix' => 'inbound', 'middleware' => 'auth'], function() use ($router) {
    $router->get('/', 'InboundStuffController@index');
    $router->post('/create', 'InboundStuffController@store');
    $router->get('/detail/{id}', 'InboundStuffController@show');
    $router->put('/update/{id}', 'InboundStuffController@update');
    $router->delete('/delete/{id}', 'InboundStuffController@destroy');
    // $router->get('recycle-bin', 'InboundStuffController@recycleBin');
    $router->get('/restore/{id}', 'InboundStuffController@restore');
    // $router-get('/force-delete/{id}',
    // 'InboundStuffController@forceDestroy');
});

$router->group(['prefix' => 'lending'], function() use ($router){
    $router->get('/', 'LendingController@index');
    $router->post('/store', 'LendingController@store');
    $router->post('/update/{id}', 'LendingController@update');

});

$router->group(['prefix' => 'restoration'], function() use ($router){
    $router->get('/', 'RestorationController@index');
    $router->post('store', 'RestorationController@store');
});
});