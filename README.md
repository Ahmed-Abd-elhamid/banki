# Banki System
	Our concern is to help the clients to deal with their financial accounts easily, and Serve most of banking transaction on one click through online banking.
	
## Prerequisites

- [node.js & npm](https://nodejs.org/)
- [Composer](https://getcomposer.org/download/)
- [laravel](http://laravel.com/)
- [MySQL](https://www.mysql.com/)
- [GraphQL](https://graphql.org/)
- [Docker](https://www.docker.com/)
- [Heroku](https://www.heroku.com/)
- [Shell Script]()

## Open Live on
- [Bankie](http://bankie.herokuapp.com/)

# QR-Code To Deployment web
<img src="https://github.com/Ahmed-Abd-elhamid/banki/blob/master/banki.png" alt="alt text" width="180">

## Installation Step by Step

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation#installation)


1. Clone the repository
    ```sh
    git clone https://github.com/Ahmed-Abd-elhamid/banki.git
    ```
2. Switch to the repo folder
    ```sh
    cd banki
    ```
3. Install all the dependencies using composer
    ```sh
    composer install
    ```
4. Config the env file
    ```sh
     .env
    ```  
5. database migration and seed
    ```sh
    $ php artisan migrate:refresh --seed
    ```
6. Start the local development server
    ```sh
    php artisan serve
    ```

    a. You can now access the Web app at http://localhost:8000

    b. Access the Api end-points at http://localhost:8000/api

    c. Access the grapQL at http://localhost:8000/graphql

## Installation Bash Script
1) download laravel.sh from https://gofile.io/d/0hFxGR

2) Run laravel script

    ```sh
    $ bash laravel.sh
    ```



## Docker Container Step By Step

1. Config
    ```sh
    docker-composer.yml and .env DB_Host: db
    ```
2. Build
    ```sh
    $ docker-compose build app
    ```
3. Run your containers in the background
    ```sh
    $ docker-compose up -d
    ```
4. Show information about the state of your active services
    ```sh
     $ docker-compose ps
    ```  
5. Check details information about files in the application directory
    ```sh
    $ docker-compose exec app ls -l
    ```
6.  Install the application dependencies
    ```sh
    $ docker-compose exec app composer install
    ```
7. Generate a unique application key with the artisan Laravel command-line tool
    ```sh
    $ docker-compose exec app php artisan key:generate
    ```
    ```sh
    $ docker-compose exec app php artisan migrate:fresh --seed
    ```
    a. You can now access the Web app at http://server_domain_or_IP:8000

8. Check the logs generated by your services
    ```sh
    $ docker-compose logs nginx
    ```

## Docker Container Bash Script
1) download docker.sh from https://gofile.io/d/WFTJHY

2) Run docker script

    ```sh
    $ bash docker.sh
    ```



## Author

[Ahmed Abdelhamid](https://www.linkedin.com/in/ahmed-abdelhamd/)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

Copyright (c) 2020 Ahmed Abdelhamid Ahmed

