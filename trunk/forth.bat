@echo off
SET PHP_PATH=Z:/usr/local/bin
%PHP_PATH%/php -q ./forth.php > output.txt
type output.txt | more
pause