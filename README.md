# onSerach

API para o hackathon

### Inicialização

```shell
Criar esquema no banco de dados chamado hackathon3
Rodar o SQL com o nome sql.SQL
```

### SCRIPTS de configuração

```shell
composer install
php artisan migrate
php artisan key:generate
php artisan serve
```

### Create Laravel 5 project with the following command:

```shell
composer create-project laravel/laravel ~/projects/github/bitclaw/laravel-books-api
php artisan ide-helper:generate
```

### Commands to get database and migrations / seeds setup

```shell
mysql> CREATE DATABASE `books-api` /*!40100 COLLATE 'utf8_general_ci' */;
php artisan migrate:install
php artisan make:migration create_books_table
php artisan make:seeder BooksTableSeeder
php artisan make:seeder InvoicesTableSeeder
php artisan migrate
php artisan db:seed --class=BooksTableSeeder
php artisan db:seed --class=InvoicesTableSeeder
php artisan migrate:refresh --seed
```

### API Endpoint

http://localhost:8000/api/v1/books

```shell
Cidades
GET http://localhost:8000/api/cities

Usuários
POST http://localhost:8000/api/users
GET http://localhost:8000/api/users
PUT/ID http://localhost:8000/api/users
DELETE/ID http://localhost:8000/api/users
GET/ID http://localhost:8000/api/users

Peguntas
POST http://localhost:8000/api/questions
GET http://localhost:8000/api/questions
PUT/ID http://localhost:8000/api/questions
DELETE/ID http://localhost:8000/api/questions
GET/ID http://localhost:8000/api/questions

Alternativas
GET http://localhost:8000/api/alternatives

Responses
POST http://localhost:8000/api/responses
GET http://localhost:8000/api/responses?user_id&question_id
PUT/ID http://localhost:8000/api/responses
DELETE/ID http://localhost:8000/api/responses
GET/ID http://localhost:8000/api/responses
```
