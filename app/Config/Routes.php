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

//routes per areaRiservata
$routes->get('/areaRiservata', 'Profilo::index');
$routes->post('/areaRiservata', 'Profilo::aggiornaProfilo');
$routes->post('/areaRiservata/ricaricaWallet', 'Profilo::ricaricaWallet');
$routes->post('/areaRiservata/inserisciAnnuncio', 'Profilo::inserisciAnnuncio');
$routes->get('/areaRiservata/eliminaAnnuncio/(:num)', 'Profilo::eliminaAnnuncio/$1');
$routes->get('/areaRiservata/scegliCandidato/(:num)/(:alphanum)', 'Profilo::scegliCandidato/$1/$2');
$routes->post('/areaRiservata/segnala/(:num)/(:alphanum)', 'Profilo::segnala/$1/$2');
$routes->get('/areaRiservata/aggiungiPreferito/(:alphanum)', 'Profilo::aggiungiPreferito/$1');
$routes->post('/areaRiservata/recensisci/(:num)/(:alphanum)', 'Profilo::recensisci/$1/$2');
$routes->get('areaRiservata/eliminaCommissione/(:num)', 'Profilo::eliminaCommissione/$1');
$routes->get('areaRiservata/iniziaAttivita/(:num)', 'Profilo::iniziaAttivita/$1');
$routes->get('areaRiservata/terminaAttivita/(:num)', 'Profilo::terminaAttivita/$1');
$routes->get('areaRiservata/pagaAttivita/(:num)/(:num)', 'Profilo::pagaAttivita/$1/$2');

//routes per esecutori
$routes->get('/esecutori', 'Esecutori::index');

//routes annunci
$routes->get('/annunci', 'Annunci::index');
$routes->post('/annunci', 'Annunci::filtraAnnunci');
$routes->get('/annunci/candidati/(:num)', 'Annunci::candidati/$1');

//routes per admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/utenti', 'Admin::utenti');
$routes->get('/admin/attivaUtente/(:alphanum)', 'Admin::attivaUtente/$1');
$routes->get('/admin/bannaUtente/(:alphanum)', 'Admin::bannaUtente/$1');
$routes->get('/admin/segnalazioni', 'Admin::segnalazioni');
