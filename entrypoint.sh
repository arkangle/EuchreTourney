#!/bin/bash
if [[ "$1" -eq "tests" ]];then
  while inotifywait -e modify --exclude ".swp$" -r src tests 2> /dev/null; do
    echo ============================================================
    phpunit
  done
else
  exec /usr/sbin/php-fpm8.0 -F
fi
