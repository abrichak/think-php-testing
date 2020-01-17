Полезные команды:

Создание пользователя и БД в MySQL 8

use mysql;
CREATE USER 'proj_user'@'localhost' IDENTIFIED BY 'Password1!';
GRANT ALL ON *.* TO 'proj_user'@'localhost';

CREATE DATABASE proj;

Импорт дампа в MySQL:

mysql --user=proj_user --password=Password1! proj < database/_data/dump.sql

Запуск встроенного PHP сервера

cp .env.example .env

php -S localhost:8000 -t public

Запуск встроенного PHP сервера с переменной окружения

APP_ENV=testing php -S localhost:8000 -t public


Инициализация codeception

php vendor/bin/codecept bootstrap 

Импорт методов в классы ...Tester 

php vendor/bin/codecept build

Создание класса с тестами

php vendor/bin/codecept generate:cest acceptance addUser

Запуск тестов

php vendor/bin/codecept run acceptance --steps
