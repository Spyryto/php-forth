<?php

namespace FORTH;

require __DIR__ . '/autoload.php';

SYSTEM\StandartDictionary::init();

$data = \file_get_contents($argv[1]);

$parser = SYSTEM\Parser::getInstance();
$parser->loadRawData($data);
$dataForQueue = $parser->makeQueue();

$queue = SYSTEM\Queue::getInstance();
$queue->loadArray($dataForQueue);

$stack = SYSTEM\Stack::getInstance();

$executor = SYSTEM\Executor::getInstance();
$executor->setStack($stack);
$executor->execute($queue);