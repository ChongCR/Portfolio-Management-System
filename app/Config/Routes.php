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

//announcement
$routes->get('/announcement', [\App\Controllers\AnnouncementController::class, 'index']);
//reference
$routes->get('/reference', [\App\Controllers\ReferenceController::class, 'index']);
//logs
$routes->get('/logs', [\App\Controllers\LogActivityController::class, 'index']);
//settings
$routes->get('/settings', [\App\Controllers\SettingController::class, 'index']);







