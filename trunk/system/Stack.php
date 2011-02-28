<?php

namespace FORTH\SYSTEM;

class Stack extends Singleton {

	private $stack = array();

	public function push($obj) {

		array_push(
			$this->stack,
			$obj
		);

	}

	public function pop() {

		if ( $this->isEmpty() )
			throw new \FORTH\EXCEPTIONS\STACK\StackIsEmpty();
		
		return array_pop(
			$this->stack
		);

	}

	public function isEmpty() {

		return empty($this->stack);

	}

}