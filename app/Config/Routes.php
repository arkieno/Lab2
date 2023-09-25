<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/main', 'MusicController::index');
$routes->get('/search', 'MusicController::searchsong');
$routes->post('/addsong', 'MusicController::addsong');
$routes->post('/createplaylist', 'MusicController::createplaylist');