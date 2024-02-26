<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//routes utente
$routes->get('/signup', 'Signup::index');
$routes->post('/signup', 'Signup::insertUtente');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');
$routes->post('/login/resetPassword', "Login::resetPassword");
$routes->get('/areaRiservata', 'Profilo::index');
$routes->post('/areaRiservata', 'Profilo::aggiornaProfilo');
$routes->post('/areaRiservata/ricaricaWallet', 'Profilo::ricaricaWallet');
$routes->post('/areaRiservata/inserisciAnnuncio', 'Profilo::inserisciAnnuncio');

//routes annunci
$routes->get('/annunci', 'Annunci::index');
$routes->post('/annunci', 'Annunci::filtraAnnunci');
$routes->get('/annunci/candidati/(:num)', 'Annunci::candidati/$1');

//routes per admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/utenti', 'Admin::utenti');
$routes->get('/admin/attivaUtente/(:alphanum)', 'Admin::attivaUtente/$1');
$routes->get('/admin/bannaUtente/(:alphanum)', 'Admin::bannaUtente/$1');
