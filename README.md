In order to set up the current project and run the Dockerfile image, first you need to build the image
running the following command in your terminal:


    docker build -t lepreu-webapp .


Is time to create a local network for connectivity

    docker network create local

Now we can run a mysql container based on current script

    docker run -d --name mysql-container \
        --network local  
        -e MYSQL_ROOT_PASSWORD=secret \  
        -e MYSQL_USER=dev \  
        -e MYSQL_PASSWORD=secret \  
        -e MYSQL_DATABASE=lepreu_db \  
        -p 3306:3306 \  
        mysql:latest  

Let's get into mysql-container

    docker exec -it mysql-container bash

And now we're going to login into mysql server instance

    mysql -u root -p
    #type password secret

Let's create some permissions for current dev user

    GRANT ALL PRIVILEGES ON *.* TO 'dev'@'%';
    ALTER USER 'dev'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
    FLUSH PRIVILEGES;

After building the image, now is time to run the current container:

    docker run -d --name lepreu-container --network local -v $(pwd):/var/www/html/webapp -v $(pwd)/docker_config/custom.ini:/usr/local/etc/php/conf.d/custom.ini -p 80:80 lepreu-webapp:latest

And now you need to change permissions for storage and bootstrap/cache folder

    sudo chown -R www-data storage bootstrap/cache

####Be sure to change your mysql connection data into .env

    DB_CONNECTION=mysql
    DB_HOST=mysql-container
    DB_PORT=3306
    DB_DATABASE=tracker_db
    DB_USERNAME=dev
    DB_PASSWORD=secret
