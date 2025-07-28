<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Routes untuk Autentikasi
$routes->get('auth/login', 'Auth::login'); // Menampilkan form login
$routes->post('auth/login', 'Auth::processLogin'); // Memproses form login
$routes->get('auth/logout', 'Auth::logout'); // Logout

$routes->get('auth/register', 'Auth::register'); // Menampilkan form register
$routes->post('auth/register', 'Auth::processRegister'); // Memproses form register

// Route untuk halaman diskusi utama
$routes->get('lihat_artikel/(:num)', 'Artikel::view/$1', ['filter' => 'auth']);
$routes->post('lihat_artikel/addComment/(:num)', 'Artikel::addComment/$1', ['filter' => 'auth']);

// Routes untuk CRUD Artikel
$routes->get('artikel', 'Artikel::index', ['filter' => 'auth']);
$routes->get('artikel/create', 'Artikel::create', ['filter' => 'auth']); // Menampilkan form tambah
$routes->post('artikel/store', 'Artikel::store', ['filter' => 'auth']);   // Memproses tambah
$routes->get('artikel/edit/(:num)', 'Artikel::edit/$1', ['filter' => 'auth']); // Menampilkan form edit
$routes->post('artikel/update/(:num)', 'Artikel::update/$1', ['filter' => 'auth']); // Memproses edit
$routes->post('artikel/delete/(:num)', 'Artikel::delete/$1', ['filter' => 'auth']); // Memproses hapus
$routes->post('artikel/approve/(:num)', 'Artikel::approve/$1', ['filter' => 'auth']); // Memproses hapus

// Routes untuk file uploads
$routes->get('file/view/(:segment)', 'Artikel::viewFile/$1', ['filter' => 'auth']); // View file
$routes->get('file/download/(:segment)', 'Artikel::downloadFile/$1', ['filter' => 'auth']); // Download file


// Contoh route untuk dashboard setelah login
$routes->get('dashboard', 'Home::index', ['filter' => 'auth']); // Membutuhkan filter 'auth'
