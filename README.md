## Pre requisites
PHP 8.2
Xampp
Or laravel herd

## Installation
git clone https://github.com/abirahmad/ics-business.git

composer update

copy and paste .env.example file and rename it .env

create a database from http://localhost/phpmyadmin

and put the name into .env file

run command on the termianl
php artisan migrate:fresh --seed

run http://localhost/your-project-name on the browser

## Credentials
http://localhost/your-project-name/login

user:admin@gmail.com
pass:123456

user:seller@gmail.com
pass:123456

http://localhost/your-project-name/ by hitting this link you will get product home page
