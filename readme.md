Useful commands:

use mysql;
CREATE USER 'proj_user'@'localhost' IDENTIFIED BY 'Password1!';
GRANT ALL ON *.* TO 'proj_user'@'localhost';

CREATE DATABASE proj;

mysql --user=proj_user --password=Password1! proj < database/_data/dump.sql

cp .env.example .env

cp .env.example .env

php -S localhost:8000 -t public

php vendor/bin/codecept bootstrap 
php vendor/bin/codecept build
php vendor/bin/codecept generate:cest functional addUser
php vendor/bin/codecept run functional --steps
