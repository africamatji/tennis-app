 
# Tennis Game - Skills alignment


 Hi, this is techinical test by Salt assigned to Africa Matji

## Installation

Navigate to project directory
`cd tennis-app`

```bash
composer install
```
```bash
npm install
```
## Environment setup
```bash
cp .env.example .env
```
Create a mysql database named `tennis`

Edit following details in `.env` file to match yours
```bash
...
DB_DATABASE=tennis
DB_USERNAME=YOUR_USERNAME
DB_PASSWORD=YOUR_PASSWORD
```

## Migration and Seeding
Please run below commands in this order. The Seed will create a default score of 0 - 0
```bash
php artisan migrate
php artisan db:seed --class=ScoreSeeder
```

## Generate Encryption Key

```bash
php artisan key:generate
```


## Run application

```bash
php artisan serve
```

Open Browser and type : `http://127.0.0.1:8000/`
 