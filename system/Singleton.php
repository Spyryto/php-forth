<?php

namespace FORTH\SYSTEM;

abstract class Singleton {

	protected static $_instances = array();

	protected function __construct() {
	}

	public static function getInstance() {

		$class = \get_called_class();
		if ( !isset( static::$_instances[$class] ) )
			static::$_instances[$class] = new static;

		return static::$_instances[$class];

	}

}