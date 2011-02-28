@echo off
SET PHP_PATH=Z:/usr/local/bin
%PHP_PATH%/php -q ./forth.php %1 > output.txt
type output.txt | more
pause