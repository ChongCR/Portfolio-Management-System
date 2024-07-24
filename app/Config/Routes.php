<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [\App\Controllers\Auth::class, 'login']);

$routes->get('/login', [\App\Controllers\Auth::class, 'login']);
$routes->post('/login', [\App\Controllers\Auth::class, 'loginAuth']);
$routes->get('/logout', [\App\Controllers\Auth::class, 'logout']);

$routes->get('/dashboard', [\App\Controllers\Home::class, 'index']);


//project
$routes->get('/project', [\App\Controllers\ProjectController::class, 'index']);
$routes->get('/project/create', [\App\Controllers\ProjectController::class, 'create']);
$routes->post('/project/store', [\App\Controllers\ProjectController::class, 'store']);
$routes->get('/project/edit/(:num)', [\App\Controllers\ProjectController::class, 'edit/$1']);
$routes->post('/project/update/(:num)', [\App\Controllers\ProjectController::class, 'update/$1']);
$routes->delete('/project/destroy/(:num)', [\App\Controllers\ProjectController::class, 'destroy/$1']);

//annoucement
$routes->get('/annoucement', [\App\Controllers\AnnoucementController::class, 'index']);
$routes->get('/annoucement/create', [\App\Controllers\AnnoucementController::class, 'create']);
$routes->post('/annoucement/store', [\App\Controllers\AnnoucementController::class, 'store']);
$routes->get('/annoucement/edit/(:num)', [\App\Controllers\AnnoucementController::class, 'edit/$1']);
$routes->post('/annoucement/update/(:num)', [\App\Controllers\AnnoucementController::class, 'update/$1']);

//reference
$routes->get('/reference', [\App\Controllers\ReferenceController::class, 'index']);
$routes->get('/reference/create', [\App\Controllers\ReferenceController::class, 'create']);
$routes->post('/reference/store', [\App\Controllers\ReferenceController::class, 'store']);
$routes->get('/reference/edit/(:num)', [\App\Controllers\ReferenceController::class, 'edit/$1']);
$routes->post('/reference/update/(:num)', [\App\Controllers\ReferenceController::class, 'update/$1']);
$routes->delete('/reference/destroy/(:num)', [\App\Controllers\ReferenceController::class, 'destroy/$1']);


//logs
$routes->get('/logs', [\App\Controllers\LogActivityController::class, 'index']);
//settings
$routes->get('/settings', [\App\Controllers\SettingController::class, 'index']);







