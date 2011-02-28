<?php

$autoload = function ($class) {

	$path = explode('\\', $class);

	if ( 'FORTH' != array_shift($path) )
		throw new \FORTH\EXCEPTIONS\SYSTEM\NamespaceIsWrong();

	$filename = array_pop($path);

	require __DIR__ . '/' .
		implode('/', array_map('strtolower', $path)) . '/' . 
		$filename . '.php';

};

spl_autoload_register($autoload);