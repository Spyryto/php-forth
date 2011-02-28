<?php

namespace FORTH\SYSTEM;

class Queue extends Singleton {

	private $queue = array();

	public function enqueue($obj) {

		array_push(
			$this->queue,
			$obj
		);

	}

	public function dequeue() {

		if ( $this->isEmpty() )
			throw new \FORTH\EXCEPTIONS\QUEUE\QueueIsEmpty();
		
		return array_shift(
			$this->queue
		);

	}

	public function isEmpty() {

		return empty($this->queue);

	}

}