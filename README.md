    ========================== 1.  Used tehnologies ==========================
	
	HTML5, CSS3, PHP7.3, MYSQL, Laravel8.1, jQuery v3.5.1, Composer
    
    for front/guest part is used template e-shoper (plugins animate.css, jquery.scrollUp, Bootstrap v3.0.3)
    
    Libraries:
    Font Awesome Free 5.13.1
	
	Application live demo on
    app-pizzashop.herokuapp.com/index.php/
	
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
	  	
	- in /public/front/js/main.js file the api route is setup for nginx server
	  depending on server set up the app route  line 2 for apache, line 5 for nginx
	
	- the loading of the picture after loading of the page is commented out because in heroku they were not loading,
	  if possible uncomment them and comment the code for picture for heroku loading
	  
	  	
