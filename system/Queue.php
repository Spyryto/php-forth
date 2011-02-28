<?php

/**
 * Класс системной очереди 
 */

namespace FORTH\SYSTEM;

class Queue extends Singleton {

	protected $queue = array();

	/**
	 *
	 * @param mixed $obj Добавляет элемент в очередь
	 */
	public function enqueue($obj) {

		array_push(
			$this->queue,
			$obj
		);

	}

	/**
	 *
	 * @return mixed Возвращает первый элемент из очереди, сдвигая очередь на один элемент
	 */
	public function dequeue() {

		if ( $this->isEmpty() )
			throw new \FORTH\EXCEPTIONS\QUEUE\QueueIsEmpty();
		
		return array_shift(
			$this->queue
		);

	}

	/**
	 * Проверяет очередь на пустоту
	 * @return boolean Пуста ли очередь
	 */
	public function isEmpty() {

		return empty($this->queue);

	}

	/**
	 * Загружает в очередь готовый массив
	 * @param array $arr Массив с данными для очереди
	 */
	public function loadArray($arr) {
		$this->queue = $arr;
	}

}