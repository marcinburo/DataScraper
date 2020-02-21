#!/bin/bash

docker-compose up -d
docker-compose exec app sh -c "php -d memory_limit=-1 /usr/local/bin/composer install"