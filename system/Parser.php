<?php
/* 
 * Парсер.
 * Его задача - разобрать входящую строку в очередь команд.
 */

namespace FORTH\SYSTEM;

class Parser extends Singleton {

	protected $rawData = '';

	/**
	 * Загружает в парсер строку, требующую парсинга
	 * @param string $str Строка, требующая парсинга
	 */
	public function loadRawData($str) {
		$this->rawData = $str;
	}

	public function makeQueue() {

		$queue	= array();
		$dict	= Dictionary::getInstance();

		$stream = \preg_split("/[\s]+/", $this->rawData);

		foreach ( $stream as $token ) {

			switch ( true ) {

				case \is_numeric($token):
					$queue[] = ( $token );
					break;

				case $dict->existsWord($token):
					$queue[] = ( $dict->getWord($token) );
					break;

				default:
					throw new \FORTH\EXCEPTIONS\DICTIONARY\WordIsNotExist();
					
			   }

		}

		return $queue;

	}

}