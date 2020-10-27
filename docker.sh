#!/bin/bash

$(echo $(docker-compose build app))
$(echo $(docker-compose up -d))
$(echo $(docker-compose ${exec} app composer install))
$(echo $(docker-compose ${exec} app php artisan key:generate))
$(echo $(docker-compose ${exec} app php artisan migrate:fresh --seed))
