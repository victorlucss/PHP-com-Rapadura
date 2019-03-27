<?php

$router->get('/article', 'ArticleController@index');

$router->get('/article/{id}', 'ArticleController@show');

$router->post('/article', 'ArticleController@store');

$router->put('/article/{id}', 'ArticleController@update');

$router->delete('/article/{id}', 'ArticleController@remove');