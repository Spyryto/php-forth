<?php

/* 
 * Класс словаря
 */

namespace FORTH\SYSTEM;

class Dictionary extends Singleton {

	/**
	 *
	 * @var array Список словарных слов
	 */
	protected $list = array();

	/**
	 *
	 * @param Word $word Слово
	 */
	public function addWord(Word $word) {
		$this->list[ $word->getName() ] = $word;
	}

	/**
	 *
	 * @param string $word Имя слова
	 * @return boolean Есть ли такое слово в словаре
	 */
	public function existsWord($name) {
		return isset( $this->list[ $name ] );
	}

	/**
	 *
	 * @param string $name Имя слова
	 * @return Word Нужное слово
	 */
	public function getWord($name) {
		if ( !$this->existsWord($name) )
			throw new \FORTH\EXCEPTIONS\DICTIONARY\WordIsNotExist();
		return $this->list[$name];
	}

}