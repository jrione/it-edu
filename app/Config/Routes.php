<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', function () {
    return redirect()->to(base_url('dashboard'));
});
$routes->get('dashboard', 'Home::index');

// Routes untuk Autentikasi
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::processLogin');
$routes->get('auth/logout', 'Auth::logout'); // Logout

$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::processRegister');

// profile
$routes->get('profile', 'Auth::view', ['filter' => 'auth']);
$routes->post('profile/update', 'Auth::updateProfile', ['filter' => 'auth']);

// Route untuk halaman diskusi utama
$routes->get('lihat_artikel/(:num)', 'Artikel::view/$1', ['filter' => 'auth']);
$routes->post('lihat_artikel/addKomen/(:num)', 'Artikel::addKomen/$1', ['filter' => 'auth']);
$routes->post('lihat_artikel/balasKomen/(:num)/(:num)', 'Artikel::balasKomen/$1/$2', ['filter' => 'auth']);

// Routes untuk CRUD Artikel
$routes->get('artikel', 'Artikel::index', ['filter' => 'auth']);
$routes->get('artikel/list-approve', 'Artikel::approveData', ['filter' => 'auth']);
$routes->get('artikel/create', 'Artikel::create', ['filter' => 'auth']);
$routes->post('artikel/store', 'Artikel::store', ['filter' => 'auth']);
$routes->get('artikel/edit/(:num)', 'Artikel::edit/$1', ['filter' => 'auth']);
$routes->post('artikel/update/(:num)', 'Artikel::update/$1', ['filter' => 'auth']);
$routes->post('artikel/delete/(:num)', 'Artikel::delete/$1', ['filter' => 'auth']);
$routes->post('artikel/approve/(:num)', 'Artikel::approve/$1', ['filter' => 'auth']);

// Routes untuk file uploads
$routes->get('file/view/(:segment)', 'Artikel::viewFile/$1', ['filter' => 'auth']);
$routes->get('file/download/(:segment)', 'Artikel::downloadFile/$1', ['filter' => 'auth']);
