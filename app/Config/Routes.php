<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::username');
$routes->get('/dashboard', 'Home::index');
$routes->get('/games1', 'Page::games1');
$routes->get('/games2', 'Page::games2');
$routes->get('/games3', 'Page::games3');

$routes->get('/index', 'Serverside::index');
//post data table
$routes->post('Serverside/listdata', 'Serverside::listdata');
$routes->post('Page/listdata1', 'Page::listdata1');
$routes->post('Page/listdata2', 'Page::listdata2');
$routes->post('Page/listdata3', 'Page::listdata3');

$routes->post('Page/data_sample1', 'Page::data_sample1');
$routes->post('Page/data_sample2', 'Page::data_sample2');
$routes->post('Page/data_sample3', 'Page::data_sample3');

//test
$routes->get('sample', 'Sample::index');
$routes->post('sample/data', 'Sample::data_sample');


//GAMES-Marcel
$routes->get('/login', 'HomeController::username');
$routes->post('/SubmitUsername', 'HomeController::submit_username');
$routes->get('/Form', 'HomeController::form');
$routes->post('/SubmitForm', 'HomeController::submit_form');
$routes->get('/RuangTunggu', 'HomeController::ruang_tunggu');
$routes->get('/TestSSE', 'HomeController::TestSSE');

//Button
$routes->post('/game1_start', 'HomeController::game1_start');
$routes->post('/game2_start', 'HomeController::game2_start');
$routes->post('/game3_start', 'HomeController::game3_start');

$routes->post('/game1_finalisasi', 'HomeController::game1_finalisasi');
$routes->post('/game2_finalisasi', 'HomeController::game2_finalisasi');
$routes->post('/game3_finalisasi', 'HomeController::game3_finalisasi');

//reset
$routes->post('/game1_reset', 'HomeController::game1_reset');
$routes->post('/game2_reset', 'HomeController::game2_reset');
$routes->post('/game3_reset', 'HomeController::game3_reset');
