    ========================== 1.  Used tehnologies ==========================
	
	HTML5, CSS3, PHP7.3, MYSQL, Laravel8.1, jQuery v3.5.1, Composer
    
    for front/guest part is used template e-shoper (plugins animate.css, jquery.scrollUp, Bootstrap v3.0.3)
    
    Libraries:
    Font Awesome Free 5.13.1
	
	
	
    ========================== 2.  Deployment description ==========================
		
	- clone the repozitory:
		sudo git clone https://github.com/zorangogusev/pizzashop.git pizzashop

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

	- create in mysql database pizzashop
	- in .env file update 
	  DB_USERNAME=your_user_name
	  DB_PASSWORD=your_password

	-pizzashop/config/database.php file it is setup for heroky, need to setup myslq data  
		- comment the data for heroku from line 67 to line 86
		- uncomment the data from line 46 to line 66

	- run the migrations
	  	php artisan migrate

	- run the database seeders
	  	php aritsan db:seed
	  	
	  	
	  	
