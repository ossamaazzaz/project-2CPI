# 7annoTech (Project 2cpi)
### Realization of a partial distance selling platform adapted to the constraints of the Algerian market .

![alt text]( https://github.com/ossamaazzaz/project-2CPI/blob/master/7anooTechScreenShots/7anooTechScreenshot-2018-6-5 SupperetteCom Home\(1\).jpg )

## Developed by :
- AMAR BENSABER MOHMAED
- AZZAZ RAHMANI OUSSAMA
- BOUSSEKAR KACEM
- GOUMEIDA AHMED SEYF-EDDINE 
- IFFEROUDJENE MOULOUD
- MESSABIH OUSSAMA

# [ ScreenShots ]( https://github.com/ossamaazzaz/project-2CPI/blob/master/7anooTechScreenShots/README.md )
 
# Installation

## Manual installation


- edit `/etc/php/php.ini` and uncomment 
	`extension=mysqli.so
	extension=pdo_mysql.so`
- clone this repository

	`git clone https://github.com/ossamaazzaz/project-2CPI.git`

- navigate to the project folder
- run `composer install` on your terminal
- copy `.env.example` file to `.env` on the project folder
- open your `.env` file and change the database name **DB_DATABASE** to whatever you have, username **DB_USERNAME** and password **DB_PASSWORD** field correspond to your configuration. On XAMPP, by default the user is `root` and the password is empty
- run `php artisan key:generate`
- run `php artisan migrate --seed`
- run `php artisan storage:link`
- run `php artisan serve`

## Admin Access
- username : admin
- email = admin@email.com
- password = secret

## Get PDF Functionality
- run `composer install`
- run `sudo cp vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64 /usr/local/bin/wkhtmltopdf`
- run `sudo chmod +x /usr/local/bin/wkhtmltopdf`
- if it didn't work contact me (renken) and/else read [the official installation guide](https://github.com/barryvdh/laravel-snappy)

