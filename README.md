# onSerach

API para o hackathon

### SCRIPTS de inicialização

```shell
Criar esquema no banco de dados chamado hackathon3
Editar .env

composer install
php artisan migrate
php artisan key:generate
php artisan serve

Rodar o SQL com o nome sql.SQL
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

Respostas
POST http://localhost:8000/api/responses
GET http://localhost:8000/api/responses?user_id&question_id
PUT/ID http://localhost:8000/api/responses
DELETE/ID http://localhost:8000/api/responses
GET/ID http://localhost:8000/api/responses
```
