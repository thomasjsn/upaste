<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', [ 'uses' => 'PasteController@index' ]);
$router->get('/stats', [ 'uses' => 'StatsController@show' ]);

# Create form
$router->get('/paste', [ 'uses' => 'PasteController@create' ]);

# Show
$router->get('/{hash:.*}', [ 'uses' => 'PasteController@show' ]);

# Upload
$router->post('/paste', [ 'uses' => 'PasteController@store' ]);
$router->post('/paste/public', [ 'uses' => 'PasteController@pub_store' ]);
