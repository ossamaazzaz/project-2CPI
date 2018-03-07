# Project 2CPI 
### Réalisation d’une plateforme de vente à distance partielle adaptée aux contraintes du marché Algérien




# Installation

## Manual installation

- clone this repository

	`git clone https://github.com/ossamaazzaz/project-2CPI.git`

- navigate to the project folder
- run `composer install` on your terminal
- copy `.env.example` file to `.env` on the project folder
- open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. On XAMPP, by default the user is `root` and the password is empty
- run php `artisan key:generate`
- run php `artisan migrate`
- run php `artisan serve`