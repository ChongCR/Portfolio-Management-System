<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [\App\Controllers\Auth::class, 'login']);

$routes->get('login', [\App\Controllers\Auth::class, 'login']);
$routes->post('login', [\App\Controllers\Auth::class, 'loginAuth']);
$routes->get('logout', [\App\Controllers\Auth::class, 'logout']);

$routes->get('dashboard', [\App\Controllers\Home::class, 'index']);






