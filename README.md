### Passo a passo para rodar o projeto
Clone Repositório
```sh
git clone -b laravel-10-com-php-8.1 https://github.com/especializati/setup-docker-laravel.git teste-wivenn
```
```sh
cd teste-wivenn
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui


Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container app
```sh
docker-compose exec app bash
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Acesse o projeto
[http://localhost:porta_que_definir_no_arquivo.yml](http://localhost:porta_que_definir_no_arquivo.yml)

Gere os seeders para gerar dados fakes para test
```sh
entre no container: docker-compose up -d
em seguida: php artisan db:seed
```


# Projeto: Estruturando uma API Restful utilizando Laravel
Esta API foi desenvolvida para gerenciar departamentos, funcionários e tarefas de uma empresa. Abaixo estão listados os endpoints disponíveis para a autenticação e as operações relacionadas aos departamentos, funcionários e tarefas de cada funcionário.

# Autenticação e Token JWT

- **POST /api/login**
**POST /api/login** - Endpoint para autenticação de usuários e geração de token JWT.

# Endpoints para Departamentos

- **GET /api/departments** - Lista todos os departamentos com seus respectivos funcionários
- **GET /api/departments/{id}** - Obtém informações sobre um departamento específico pelo seu ID
- **POST /api/departments** - Cadastra um novo departamento
- **PUT /api/departments/{id}** - Atualiza as informações de um departamento específico pelo seu ID
- **DELETE /api/departments/{id}** - Deleta um departamento existente pelo seu ID*


# Endpoints para Funcionários

- **GET /api/employees** - Lista todos os funcionários com informações sobre seus respectivos departamentos e tarefas.
- **GET /api/employees/{id}** - Obtém informações sobre um funcionário específico pelo seu ID.
- **POST /api/employees** - Cadastra um novo funcionário para um departamento especifico.
- **PUT /api/employees/{id}** - Atualiza as informações de um funcionário específico pelo seu ID
- **DELETE /api/employees/{id}** - Deleta um funcionário existente pelo seu ID


# Endpoints para Tarefas

- **GET /api/tasks** - Lista todas as tarefas que trará informação sobre seu respectivo funcionário.
- **GET /api/tasks/{taskId}** - Obtém informações sobre uma tarefa específica pelo seu ID trazendo o responsavél por aquela tarefa.
- **POST /api/tasks** - Cadastra uma nova tarefa para um funcionário especifico.
- **PUT /api/tasks/{taskId}** - Atualiza as informações de uma tarefa específica pelo seu ID
- **DELETE /api/tasks/{taskId}** - Deleta uma tarefa existente pelo seu ID
