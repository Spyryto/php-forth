<?php

namespace FORTH\SYSTEM;

/*
 * Класс словарного слова
 */
class Word {

	protected $wordName;
	protected $operandsCount;
	protected $stackPopCount;
	protected $callback;

	/**
	 *
	 * @var string Маска, задающая допустимые символы в имени слова
	 */
	protected static $wordAllowedMask = "/[A-Z\.\_\+\-\*\/]{1}[A-Z\.\_\+\-\*\/]*/";

	/**
	 *
	 * @param string $wordName Имя слова
	 * @param int $operandsCount Размерность слова - число операндов, передаваемых слову
	 * @param int $stackPopCount Эффект над стеком - сколько объектов слово требует снять со стека
	 * @param callback $callback Функция, реализующая слово, должна возвращать либо null, либо массив из объектов, которые требуется положить на стек
	 */
	public function __construct($wordName, $operandsCount, $stackPopCount, $callback) {

		if ( !preg_match(self::$wordAllowedMask, $wordName ) )
			throw new \FORTH\EXCEPTIONS\WORD\WordNameIsWrong();

		$this->wordName			= $wordName;
		$this->operandsCount	= $operandsCount;
		$this->stackPopCount	= $stackPopCount;
		$this->callback			= $callback;

	}

	/**
	 *
	 * @return string Имя слова
	 */
	public function getName() {
		return $this->wordName;
	}

}