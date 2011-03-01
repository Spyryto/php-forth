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
					echo $a . "\n\r";
					return null;
				}
			)
		);

		/*
		 * Дубль верхнего числа со стека
		 */
		$dict->addWord(
			new Word(
				'DUP',
				1,
				1,
				function ($a) {
					return array($a, $a);
				}
			)
		);

		/*
		 * Обмен двух верхних чисел со стека
		 */
		$dict->addWord(
			new Word(
				'SWAP',
				2,
				2,
				function ($a, $b) {
					return array($a, $b);
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
					return (array) ($b+$a);
				}
			)
		);

		/*
		 * Вычитание двух верхних чисел, помещение результата на стек
		 */
		$dict->addWord(
			new Word(
				'-',
				2,
				2,
				function ($a, $b) {
					return (array) ($b-$a);
				}
			)
		);

		/*
		 * Умножение двух верхних чисел, помещение результата на стек
		 */
		$dict->addWord(
			new Word(
				'*',
				2,
				2,
				function ($a, $b) {
					return (array) ($b*$a);
				}
			)
		);

		/*
		 * Целочисленное деление двух верхних чисел, помещение результата на стек
		 */
		$dict->addWord(
			new Word(
				'/',
				2,
				2,
				function ($a, $b) {
					return (array) (intval(floor($b/$a)));
				}
			)
		);

	}
	
}