#!/bin/bash

docker-compose up -d
docker-compose exec app sh -c "composer install"