    ========================== 1.  Used technologies ==========================
	
	HTML5, CSS3, PHP8.0, MYSQL, Laravel8.1, jQuery v3.5.1, Composer Docker
    
    for front/guest part is used template e-shoper (plugins animate.css, jquery.scrollUp, Bootstrap v3.0.3)
    
    Libraries:
    Font Awesome Free 5.13.1
	
	Application live demo on
    app-pizzashop.herokuapp.com/index.php/
	
    ========================== 2.  Deployment description ==========================
		
	- clone the repozitory:
		sudo git clone https://github.com/zorangogusev/pizzashop.git pizzashop

    - run docker
        sudo docker-compose up -d --build

	- install composer:	
	  	sudo composer install
	
	- change owner
		sudo chown -R www-data:www-data pizzashop/

	- change permission of storage
		sudo chmod -R 777 storage/

	- create .env file
		sudo cp .env.example .env	  
	
	- create app key
	  	php artisan key:generate


	- in .env file add 
        DB_CONNECTION=mysql
        DB_HOST=pizzashop-mariadb-10.2
        DB_PORT=3306
        DB_DATABASE=pizzashop
        DB_USERNAME=zoran
        DB_PASSWORD=zoran

    - enter in docker container
        sudo docker exec -it pizzashop-web /bin/bash
        cd /var/www/html
        - run the migrations
            php artisan migrate
    
        - run the database seeders
            php aritsan db:seed

	- the loading of the picture after loading of the page is commented out because in heroku they were not loading,
	  if possible uncomment them and comment the code for picture for heroku loading
	  
	  	
