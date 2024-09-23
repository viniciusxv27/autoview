<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'App::dashboard');
$routes->get('veiculo/(:num)?', 'App::veiculo/$1');
$routes->get('veiculos', 'App::veiculos');
$routes->get('token', 'App::token');
$routes->post('alterar_token', 'App::alterar_token');
$routes->get('conta', 'App::conta');
$routes->get('docs', 'App::docs');
$routes->get('alterar_informacoes', 'App::alterar_informacoes');

$routes->group('auth', function (RouteCollection $routes) {
    $routes->get('login','Auth::login');
    $routes->get('logout','Auth::logout');
    $routes->get('cadastro', 'Auth::cadastro');
    $routes->post('cadastrar', 'Auth::cadastrar');
    $routes->post('masuk','Auth::masuk');
    $routes->get('recuperar','Auth::recuperar');
    $routes->get('codigo/(:num)?','Auth::definepass/$1');
    $routes->post('definir','Auth::newpass');
});

$routes->group('api', function (RouteCollection $routes) {
    $routes->post('carros/(:num)?', 'Api::carros/$1');
    $routes->post('motos/(:num)?', 'Api::motos/$1');
    $routes->post('caminhoes/(:num)?', 'Api::caminhoes/$1');
    $routes->post('maquinas/(:num)?', 'Api::maquinas/$1');
    $routes->post('carros', 'Api::carros');
    $routes->post('motos', 'Api::motos');
    $routes->post('caminhoes', 'Api::caminhoes');
    $routes->post('maquinas', 'Api::maquinas');
    $routes->post('alterar_token', 'Api::alterar_token');
    $routes->post('confirmar_assinatura', 'Api::confirmar_assinatura');
    $routes->post('cancelar_assinatura', 'Api::cancelar_assinatura');
    $routes->post('alterar_informacoes', 'Api::alterar_informacoes');
    $routes->post('adicionar_parte', 'Api::adicionar_parte');
    $routes->post('retirar_parte', 'Api::retirar_parte');
});