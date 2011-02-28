<?php

namespace FORTH\SYSTEM;

abstract class Singleton {

	protected static $_instance = null;

	protected function __construct() {
	}

	public static function getInstance() {

		if ( is_null( static::$_instance ) )
			static::$_instance = new static;

		return static::$_instance;

	}

}