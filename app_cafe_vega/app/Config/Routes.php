<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/','Home::index');
$routes->get('/dashboard','Home::dashboard');

$routes->get('/user','Controller::tampil');
$routes->add('/user','Controller::create');
$routes->get('/user/delete/(;segment)','UserController::delete/$1');
$routes->add('/user/edit/(;segment)','UserController::edit/$1');

$routes->get('/pesan','Controller::tampil');
$routes->add('/pesan','Controller::create');
$routes->get('/pesan/delete/(;segment)','PesanContoller::delete/$1');
$routes->add('/pesan/edit/(;segment)','PesanController::edit/$1');

$routes->get('/menu','Controller::tampil');
$routes->add('/menu','Controller::create');
$routes->get('/menu/delete/(;segment)','MenuController::delete/$1');
$routes->add('/menu/edit/(;segment)','MenuController::edit/$1');

$routes->get('/detail_pesan','Controller::tampil');
$routes->add('/detail_pesan','Controller::create');
$routes->get('/detail_pesan/delete/(;segment)','DetailpesanContoller::delete/$1');
$routes->add('/detail_pesan/edit/(;segment)','DetailpesanController::edit/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
