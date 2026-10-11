<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');
$routes->get('customers', 'Customers::index');
$routes->get('users', 'Users::index');
$routes->get('customers/new', 'Customers::newForm');
$routes->post('customers/store', 'Customers::store');
$routes->get('users/new', 'Users::newForm');
$routes->post('users/store', 'Users::store');
$routes->get('customers/(:num)/edit', 'Customers::edit/$1');
$routes->post('customers/(:num)/update', 'Customers::update/$1');
$routes->get('users/(:num)/edit', 'Users::edit/$1');
$routes->post('users/(:num)/update', 'Users::update/$1');

