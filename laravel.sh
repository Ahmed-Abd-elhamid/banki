#!/bin/sh

HC='\033[0;32m' # Heading Color
NC='\033[0m' # No Color

FOLDER="banki"
GIT_URL="https://github.com/Ahmed-Abd-elhamid/banki.git" 

echo -e "${HC}::::::::::::::::::::::::::Cloning Git Repo::::::::::::::::::::::::::${NC}"
git clone ${GIT_URL} 
cd ${FOLDER}

echo -e "${HC}::::::::::::::::::::::::::Composer Install::::::::::::::::::::::::::${NC}"
composer install --optimize-autoloader

echo -e "${HC}::::::::::::::::::::::::::Creating Database::::::::::::::::::::::::::${NC}"
read -p "Please enter DB name for Project : " db
read -p "Please enter password for MySQL root user : " passwd
mysql -uroot -p${passwd} -e "CREATE DATABASE ${db}"

echo -e "${HC}::::::::::::::::::::::::::Creating Storage Directory::::::::::::::::::::::::::${NC}"
php artisan storage:link

echo -e "${HC}::::::::::::::::::::::::::Database Setup::::::::::::::::::::::::::${NC}"
cp .env.example .env

# config name database
sed -i -e 's/DB_DATABASE=laravel//g' .env
sed  -i "12i  DB_DATABASE=${db}" .env

# config username
sed -i -e 's/DB_USERNAME=root//g' .env
sed  -i "12i  DB_USERNAME=root" .env

# config password
sed -i -e 's/DB_PASSWORD=//g' .env
sed  -i "12i  DB_PASSWORD=${passwd}" .env

echo -e "${HC}::::::::::::::::::::::::::Database Migration::::::::::::::::::::::::::${NC}"
php artisan migrate:fresh

echo -e "${HC}::::::::::::::::::::::::::Seed Database::::::::::::::::::::::::::${NC}"
php artisan db:seed

echo -e "${HC}::::::::::::::::::::::::::All Completed::::::::::::::::::::::::::${NC}"
php artisan key:generate
php artisan serve