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




# Como configurar o Debug no VSCode para o Laravel 8

Configurando PHP e VSCode para Depuração

No arquivo routes:web crie a rota info:

```
Route::get('/info', function () { 
    return phpinfo(); 
});
```

Pegue o conteúdo e jogue em
https://xdebug.org/wizard

Jeito fácil
sudo apt-get install php7.4-xdebug

Compilado, baixe
https://xdebug.org/files/xdebug-3.1.0.tgz

```
Instructions 
Download xdebug-3.1.0.tgz  
Install the pre-requisites for compiling PHP extensions. These packages are often called 'php-dev', or 'php-devel', 'automake' and 'autoconf'. 

Unpack the downloaded file with tar -xvzf xdebug-3.1.0.tgz 
Run: cd xdebug-3.1.0 

Run: phpize (See the FAQ if you don't have phpize). 

 phpize 
Configuring for: 
PHP Api Version:         20190902 
Zend Module Api No:      20190902 
Zend Extension Api No:   320190902 
config.m4:12: warning: file `build/pkg.m4' included several times 
config.m4:12: warning: file `build/pkg.m4' included several times
As part of its output it should show: 
Configuring for: 
... 
Zend Module Api No:      20190902 
Zend Extension Api No:   320190902 
If it does not, you are using the wrong phpize. Please follow this FAQ entry and skip the next step. 
Run: ./configure 
Run: make 
Run: sudo cp modules/xdebug.so /usr/lib/php/20190902 

sudo touch /etc/php/7.4/cli/conf.d/99-xdebug.ini
sudo joe /etc/php/7.4/cli/conf.d/99-xdebug.ini
Create /etc/php/7.4/cli/conf.d/99-xdebug.ini and add the line: 
zend_extension = xdebug 

Please also update php.ini files in adjacent directories, as your system seems to be configured with a separate php.ini file for the web server and command line. 

Restart PHP's built-in HTTP server (php -S) 
Enabling Features 
Now Xdebug is installed, you can enable its features. Please refer to the dedicated sections in the documentation about information on how to enable and configure these Xdebug features. Where these sections refer to php.ini or similar, please remember to use /etc/php/7.4/cli/conf.d/99-xdebug.ini: 
Development Helpers — help you get better error messages and obtain better information from PHP's built-in functions. 
Step Debugging — allows you to interactively walk through your code to debug control flow and examine data structures. 
Profiling — allows you to find bottlenecks in your script and visualize those with an external tool.
```

Basta reiniciar o servidor PHP
```
sudo /etc/init.d/php7.4-fpm restart
```

Pare o servidor laravel e reinicie novamente depois cole a página novamente em https://xdebug.org/wizard
E você verá:

```
Xdebug installed: 2.9.2 
Server API: Built-in HTTP server 
Windows: no 
Zend Server: no 
PHP Version: 7.4.3 
Zend API nr: 320190902 
PHP API nr: 20190902 
Debug Build: no 
Thread Safe Build: no 
OPcache Loaded: yes 
Configuration File Path: /etc/php/7.4/cli 
Configuration File: /etc/php/7.4/cli/php.ini
```

```
sudo joe /etc/php/7.4/cli/php.ini
```

```
zend_extension=/usr/lib/php/20190902/xdebug.so 
;zend_extension="xdebug.so" 
xdebug.mode = debug 
xdebug.log = /tmp/xdebug.log 
xdebug.client_port = 9003
```

No PHP.INI
Como instalei meu php pelo Ansible, ele não tinha nada referente a extensions
então eu coloquei as configurações na seção Miscellaneous.
```
;;;;;;;;;;;;;;;;; 
; Miscellaneous ; 
;;;;;;;;;;;;;;;;; 
expose_php = On 

;Codigo adicionado
zend_extension=/usr/lib/php/20190902/xdebug.so 
xdebug.remote_enable = 1 
xdebug.remote_autostart = 1 
xdebug.log = /tmp/xdebug.log 
xdebug.profiler_enable = off 
xdebug.profiler_enable_trigger = off 
xdebug.profiler_output_name = cachegrind.out.%t.%p 
xdebug.profiler_output_dir = /tmp 
xdebug.show_local_vars=0 
xdebug.remote_host=localhost 
xdebug.remote_port=9003
```

Debug Laravel no VScode XDebug

Configure o launch.json como sendo:

```
{ 
    "configurations": [ 
    { 
        "name": "Listen for Xdebug", 
        "type": "php", 
        "request": "launch", 
        "port": 9003 
    } 
    ] 
}
```

Para testar você deve iniciar o php artisan serve e também apertar
o Debug.

Vamos colocar um breakpoint na rota que criamos para nos informar sobre o php

```
Route::get('/info', function () { 
    return phpinfo(); 
});
```

Acesse: http://127.0.0.1:8000/info
volte para o vscode e veja que a requisição está 













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
