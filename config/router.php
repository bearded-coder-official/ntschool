<?php

$routerContainer = new \Aura\Router\RouterContainer();
$router = $routerContainer->getMap();

$router->get('home', '/', \NtSchool\Action\HomeAction::class);
$router->get('blog', '/blog', \NtSchool\Action\HomeAction::class);
$router->get('posts', '/posts', \NtSchool\Action\HomeAction::class);
$router->get('cat', '/category/{id}', \NtSchool\Action\PostByCategoryAction::class);
