# LARAVEL CURSO UDEMY


```s
CREATE DATABASE locadoradb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'admin_mariadb'@'localhost' IDENTIFIED BY 'changeme';
GRANT ALL PRIVILEGES ON *.* TO 'admin_mariadb'@'localhost';
CREATE USER 'admin_mariadb'@'%' IDENTIFIED BY 'changeme';
GRANT ALL PRIVILEGES ON *.* TO 'admin_mariadb'@'%';
flush privileges;
quit;
```

Na prática basta acessar o mysql com root (sudo) e criar o BD
o usuário já foi criado para outros BDs e mantive o mesmo.

```s
sudo mysql
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 39
Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1 Ubuntu 20.04

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> show databases
    -> ;
+--------------------+
| Database           |
+--------------------+
| blogql01           |
| information_schema |
| mysql              |
| performance_schema |
| tg30anos_db        |
+--------------------+
5 rows in set (0.003 sec)

MariaDB [(none)]> CREATE DATABASE locadoradb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
Query OK, 1 row affected (0.001 sec)

```

## .env

```s
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=locadoradb
DB_USERNAME=admin_mariadb
DB_PASSWORD=changeme
```

Execute os seguintes comandos:

```s
composer install
composer update
npm install 
npm run dev
php artisan key:generate
php artisan migrate
php artisan db:seed
```

Versão do Laravel usado:
```s
php artisan -V
Laravel Framework 8.63.0
```

Finalmente:

```s
php artisan serve
```

Acesse: `localhost:8000`


# DESCRIÇÃO DESTE PROJETO

Este projeto implementa uma API de Aluguéis de Carro.

Não possui o FrontEnd.. as rotas estão todas em routes/api.php


















# TODO: `graphql`

Aula:
https://www.udemy.com/course/master-laravel-with-graphql-vuejs-and-tailwind/learn/lecture/21630804#overview

Detalhes da Instalação do GraphQL para Laravel em 
https://lighthouse-php.com/5/getting-started/installation.html#lumen

```s
composer create-project laravel/laravel blog-ql --prefer-dist
composer require nuwave/lighthouse
composer require mll-lab/laravel-graphql-playground
composer require --dev barryvdh/laravel-ide-helper
composer require laravel/ui 
php artisan ui vue
npm install
npm run dev
https://lighthouse-php.com/5/performance/n-plus-one.html#eager-loading-relationships
composer require nuwave/lighthouse
php artisan vendor:publish --tag=lighthouse-schema
composer require mll-lab/laravel-graphql-playground
```

Inicie o servidor e acesse:

http://localhost:8000/graphql-playground

php artisan db:seeder


```s
{
  user(id: 1){
    id
    name
    email
  }
}
```

```s
{
  users {
    paginatorInfo {
      total
      perPage
      currentPage
    }
    data {
      id
      email
      name
    }
  }
}
```

```s
{
  users(page: 2) {
    paginatorInfo {
      total
      perPage
      currentPage
    }
    data {
      id
      email
      name
    }
  }
}
```
