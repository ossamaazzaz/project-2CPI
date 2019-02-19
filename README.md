# 7anooTech
### Realization of a partial distance selling platform adapted to the constraints of the Algerian market .

<img src="https://raw.githubusercontent.com/th3happybit/7anooTech/master/logo.png" alt="7anooTech" class="inline"/>

<img src="https://raw.githubusercontent.com/th3happybit/7anooTech/master/7anooTechScreenShots/7anooTechScreenshot-2018-6-5-SupperetteCom-Home-1.jpg" alt="Home Page" class="inline"/>

## Developed by :
- AMAR BENSABER MOHMAED
- AZZAZ RAHMANI OUSSAMA
- BOUSSEKAR KACEM
- GOUMEIDA AHMED SEYF-EDDINE 
- IFFEROUDJENE MOULOUD
- MESSABIH OUSSAMA

# [ ScreenShots ]( https://github.com/th3happybit/7anooTech/blob/master/7anooTechScreenShots/README.md )

# [ Docs ]( https://github.com/th3happybit/7anooTech/blob/master/docs/README.md )


## Installation
7anoTech was developed to be mainly deployed using Docker, the following instructions will guide you to deploy 7annoTech on a machine that has Docker already installed. Please visit this [link](https://docs.docker.com/install/) if you don't have Docker installed yet.

#### Get the source code
First run the following command to get the Project code:
```bash
$ git clone https://github.com/th3happybit/7anooTech
```

Then change your current directory to 7anooTech:
```bash
$ cd 7anooTech
```

###### NOTE :
If you don't have Git installed then download the code as a zip file and unzip it in 7anooTech directory.

#### Start the server
For a simple usage run :
```bash
$ docker-compose up
```
It should take some time the first time your run this command (it depends on your connection), docker images will be pulled and built.

## How it works?
At the time that you start the server, your machine should have port 80 listening to receive HTTP requests.

![deployment diagram](/imgs/DeploymentDiagram.png)

The Docker Daemon should start 3 containers when you run `docker-compose` : app, db and webserver.
- app is the container that is contains the Laravel application.

- db is running a mysql image, the MySQL database is used by the web app to store many information. The server is not binding any port to this container.

- webserver is running a nginx image, used to run the web server that's gonna serve the app in ports 443, 80.

All this containers are connected together in a local virtual LAN and can't be accessed from the outside unless a port is binded.


## Manual installation


- edit `/etc/php/php.ini` and uncomment 
	`extension=mysqli.so
	extension=pdo_mysql.so`
- clone this repository

	`git clone https://github.com/th3happybit/7annoTech.git`

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