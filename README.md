
# Setup
	- git clone https://github.com/krazytechdevteam/agent-find-portal
	- cd agent-find-portal
	- composer install [append "--ignore-platform-reqs" in windows if facing any issues]
	- cp .env.example .env
	- php artisan key:generate 
	- Modify datbase information in .env file with following variable
		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=lo-portal
		DB_USERNAME=root
		DB_PASSWORD=
	- php artisan migrate   <--- [ Also, Run this after code pull, for db related changes to take effect ]
	- php artisan db:seed

# Configuration
	
	- Prouction
		- php artisan key:generate
		- .env changes
			- Set Debug to false in  ---> APP_DEBUG=false
		
### Official Documentation

[Click here for the official documentation](http://laravel-boilerplate.com)
