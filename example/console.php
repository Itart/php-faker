<?php

spl_autoload_register(function($class) {
    $classFile = str_replace('\\', '/', $class);
    require_once __DIR__ . '/../lib/' . $classFile . '.php';
});

$faker = new PHPFaker\Faker();

var_dump($faker->internet->email);
