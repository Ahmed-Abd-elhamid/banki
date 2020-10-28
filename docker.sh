#!/bin/bash

HC='\033[0;32m' # Heading Color
NC='\033[0m' # No Color

# config name database
sed -i -e 's/DB_HOST=127.0.0.1//g' .env
sed  -i "12i  DB_HOST=db" .env

docker-compose build app
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate:fresh --seed

sed -i -e 's/DB_HOST=db//g' .env
sed  -i "12i  DB_HOST=127.0.0.1" .env

echo -e "${HC}:::::::SERVED ON: http://server_domain_or_IP:8000:::::${NC}"
echo -e "${HC}:::::::Where server_domain_or_IP one of the Folowing:::::${NC}"
hostname -I