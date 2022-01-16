#!/bin/bash
if [[ "$1" -eq "tests" ]];then
  while inotifywait -e modify --exclude ".swp$" -r src tests; do
    phpunit
  done
else
  exec /usr/sbin/php-fpm8.0 -F
fi
