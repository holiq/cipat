<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/dosen', 'Dosen::index');
$routes->get('/dosen/create', 'Dosen::create');
$routes->post('/dosen/store', 'Dosen::store');
$routes->get('/dosen/edit/(:num)', 'Dosen::edit/$1');
$routes->put('/dosen/update/(:num)', 'Dosen::update/$1');
$routes->delete('/dosen/delete/(:num)', 'Dosen::destroy/$1');
$routes->get('/barang', 'Product::index');
$routes->get('/barang/create', 'Product::create');
$routes->post('/barang/store', 'Product::store');
$routes->get('/barang/edit/(:num)', 'Product::edit/$1');
$routes->put('/barang/update/(:num)', 'Product::update/$1');
$routes->delete('/barang/delete/(:num)', 'Product::destroy/$1');
$routes->get('/customer', 'Customer::index');
$routes->get('/customer/create', 'Customer::create');
$routes->post('/customer/store', 'Customer::store');
$routes->get('/customer/edit/(:num)', 'Customer::edit/$1');
$routes->put('/customer/update/(:num)', 'Customer::update/$1');
$routes->delete('/customer/delete/(:num)', 'Customer::destroy/$1');
$routes->get('/transaksi', 'Transaction::index');
$routes->get('/transaksi/create', 'Transaction::create');
$routes->post('/transaksi/store', 'Transaction::store');
$routes->get('/transaksi/edit/(:num)', 'Transaction::edit/$1');
$routes->put('/transaksi/update/(:num)', 'Transaction::update/$1');
$routes->delete('/transaksi/delete/(:num)', 'Transaction::destroy/$1');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::process');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::process');
$routes->get('/logout', 'Login::destroy');
