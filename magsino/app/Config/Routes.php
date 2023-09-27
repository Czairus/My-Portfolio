<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ProductController::index');
$routes->get('/main', 'ProductController::index');
$routes->post('/main/insert', 'ProductController::insert');
$routes->get('/main/edit/(:num)', 'ProductController::edit/$1');
$routes->post('/main/update/(:num)', 'ProductController::update/$1');
$routes->get('/main/delete/(:num)', 'ProductController::delete/$1');
$routes->get('/main/create', 'ProductController::create');
$routes->get('/main/listByCategory', 'ProductController2::listByCategory');
$routes->get('/main/category', 'ProductController2::category');
$routes->post('/main/category', 'ProductController2::categories');
$routes->get('/main/listByCategory/(:any)', 'ProductController::listByCategory/$1');













