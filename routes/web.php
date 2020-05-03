<?php

$router->add('', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('home', ['controller' => 'HomeController', 'action' => 'index']);

// Auth routes
$router->add('login', ['controller' => 'AuthController', 'action' => 'login']);
$router->add('registration', ['controller' => 'AuthController', 'action' => 'register']);
$router->add('auth', ['controller' => 'AuthController', 'action' => 'verify']);
$router->add('logout', ['controller' => 'AuthController', 'action' => 'logout']);

// User routes
$router->add('user/store', ['controller' => 'UserController', 'action' => 'store']);

// Post routes
$router->add('posts', ['controller' => 'PostsController', 'action' => 'index']);
$router->add('posts/create', ['controller' => 'PostsController', 'action' => 'create']);
$router->add('posts/store', ['controller' => 'PostsController', 'action' => 'store']);

$router->add('posts/{id:\d}', ['controller' => 'PostsController', 'action' => 'show']);
