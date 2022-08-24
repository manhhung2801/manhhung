###1. Open command line tool and cd to root folder to run command to start docker

    docker-compose up -d

###2. Create .env from .env.example file, then input info for connect database

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=example_app
    DB_USERNAME=sail
    DB_PASSWORD=password


###3. Use a tool phpmyadmin/datagrip to connect database with info above

###4. Login into docker container of webserver and run some commands

####-Run command to get container ID:
    docker ps

####-Run command to log into this container:
    docker exec -it [containerID] bash

####-Run command to install vendor:
    composer install

####-Run command to genarate key:
    php artisan key:generate

####-Run command to apply migration( create tables to mysql ):
    php artisan migrate

####-Run command logout this container
    exit

####-Run command to restart
    docker-compose down
    docker-compose up -d

###4. Open chrome with url:
   http://0.0.0.0:8080/


# LearnLaravel
# LearnLaravel
