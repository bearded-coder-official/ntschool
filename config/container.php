<?php

/** @var $renderer \Illuminate\View\Factory */

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();

$container->set(\NtSchool\Action\HomeAction::class, function () use ($renderer) {
    return new \NtSchool\Action\HomeAction();
});

$container->set(\NtSchool\Action\PostByCategoryAction::class, function () use ($renderer) {
    return new \NtSchool\Action\PostByCategoryAction();
});

function view($name, array $data)
{
    global $renderer;
    return $renderer->make($name, $data);
}