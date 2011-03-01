<?php
/* 
 * "Исполнитель" Форт-машины
 */

namespace FORTH\SYSTEM;

class Executor extends Singleton {

	protected $stack = null;

	/**
	 *
	 * @param Stack $stack Указатель на стек, на котором будет работать Форт-машина
	 */
	public function setStack(Stack $stack) {
		$this->stack = $stack;
	}

	public function execute(Queue $queue) {

		if ( \is_null($this->stack) )
			throw new \FORTH\EXCEPTIONS\EXECUTOR\EmptyExecutorStack();

		/*
		 * Главный цикл Форт-Машины
		 */
		while ( !$queue->isEmpty() ) {

			$command = $queue->dequeue();

			switch ( true ) {

				case \is_numeric($command):
					$this->stack->push($command);
					break;

				case \get_class($command) == __NAMESPACE__ . '\Word':
					
					$word = $command;

					$args = array();

					for ( $i = 1; $i <= $word->getStackPopCount(); $i++ )
						$args[] = $this->stack->pop();

					$args = \array_slice($args, 0, $word->getOperandsCount());

					$result = \call_user_func_array($word->getCallback(), $args);

					if ( !\is_null($result) ) {
						foreach ( $result as $res ) {
							$this->stack->push($res);
						}
					}

					break;

				default:
					throw new \FORTH\EXCEPTIONS\EXECUTOR\BadCommandInQueue();

			}

		}

	}
	
}