<?php
/* 
 * Стандартный словарь Форт-машины, инициализация
 *
 */

namespace FORTH\SYSTEM;

class StandartDictionary {

	/**
	 * Инициализация стандартного словаря
	 */
	public static function init() {

		$dict = Dictionary::getInstance();

		/*
		 * Печать верхнего числа со стека
		 */
		$dict->addWord(
			new Word(
				'.',
				1,
				1,
				function ($a) {
					echo $a;
					return null;
				}
			)
		);

		/*
		 * Сложение двух верхних чисел, помещение результата на стек
		 */
		$dict->addWord(
			new Word(
				'+',
				2,
				2,
				function ($a, $b) {
					return (array)($a+$b);
				}
			)
		);

	}
	
}