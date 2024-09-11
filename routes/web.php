<?php

use App\Controllers\UserController;

// Definindo as rotas
$routes = [
    'GET' => [
        '' => [UserController::class, 'index'],
        '/users' => [UserController::class , 'index']
    ],
    'POST' => [
        '/users' => [UserController::class, 'store'],
    ]
];

// Captura a URL requisitada e o método HTTP
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = rtrim(str_replace('/mvcPhp/mvcGpt', '', $url), '/');
$method = $_SERVER['REQUEST_METHOD'];

// Verifica se a rota existe no método HTTP correspondente
if (isset($routes[$method][$url])) {
    $controllerInfo = $routes[$method][$url];
    $controllerName = $controllerInfo[0];
    $methodName = $controllerInfo[1];
    
    // Instancia o controlador e chama o método
    $controller = new $controllerName();
    $controller->$methodName();
   
} else {
    // Retorna erro 404 para rotas não encontradas
    http_response_code(404);
    echo json_encode(['message' => 'Endpoint não encontrado']);
}
