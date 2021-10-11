# 1. LARAVEL LOCADORA DE CARROS

Objetivo: atualizar o aprendizado do Laravel que está na versão 8. 
Tem bastante coisa nova, porém, muita coisa que vem das versões anteriores.

## 1.1. Requisitos

Precisamos ter o MySQL ou MariaDB, NodeJS, PHP 7.4+ e Composer.
Vale muito você instalar tudo isto no seu WSL2 (Windows Subsystem for Linux 2)
se você não utiliza, ou não conhece vale a pena conferir este excelente tutorial
que o pessoal da FullCycle criou: https://github.com/codeedu/wsl2-docker-quickstart

A única coisa é que o Linux dentro do Windows necessita que você inicialize os
serviços manualmente. Exemplo: devemos iniciar o mysql o php antes de começarmos 
a trabalhar no projeto. 

Vou supor que você resolveu utilizar o WSL2 para programar, que fica muito simples.
Outra dica é montar os requisitos dentro de um Conteiner Docker. Se você também
não sabe o que é um `docker-compose.yml` vale conferir o canal do youtube do pessoal
da FullCycle. 


# 2. Criando a Aplicação Passo a Passo

Depois de instalados os requisitos vamos iniciar criando o BD que utilizaremos:

Na prática basta acessar o mysql com root (sudo) e criar o BD
e o usuário:

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
| information_schema |
| mysql              |
| performance_schema |
+--------------------+
5 rows in set (0.003 sec)

MariaDB [(none)]> CREATE DATABASE locadoradb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
Query OK, 1 row affected (0.001 sec)
MariaDB [(none)]> show databases
    -> ;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
| locadoradb        |
+--------------------+
5 rows in set (0.003 sec)
```

Resumo dos comandos completo:

```s
CREATE DATABASE locadoradb CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'admin_mariadb'@'localhost' IDENTIFIED BY 'changeme';
GRANT ALL PRIVILEGES ON *.* TO 'admin_mariadb'@'localhost';
CREATE USER 'admin_mariadb'@'%' IDENTIFIED BY 'changeme';
GRANT ALL PRIVILEGES ON *.* TO 'admin_mariadb'@'%';
flush privileges;
quit;
```

Agora crie ou copie do arquivo `.env.example` o arquivo `.env` na raiz do projeto.

```s
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=locadoradb
DB_USERNAME=admin_mariadb
DB_PASSWORD=changeme
```

# 3. SETUP DO PROJETO BAIXADO DO GIT

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

Como saber a versão do Laravel usado:
```s
php artisan -V
Laravel Framework 8.63.0
```

Finalmente inicie o site com o comando:

```s
php artisan serve
```

Se acessarmos o endereço `http://localhost:8000` veremos a tela inicial de Welcome
do Laravel 8. Que por enquanto não programamos a interface gráfica inicial. 

Porém, utilize o Postman para testar a API. Em `docs/POSTMAN_COLLECTION` basta
importar a Collection do Postman para seu Workspace e sair utilizando.


# 4. Como configurar o XDebug no VSCode para o Laravel 8

1. Instale Debug support for PHP with Xdebug Extension no VSCode.

No arquivo `routes:web` do projeto criamos a rota info pois
precisaremos copiar e colar o seu conteúdo em `https://xdebug.org/wizard`

```php
Route::get('/info', function () { 
    return phpinfo(); 
});
```

Então, primeiro verifique se o projeto está rodando `php artisan serve`
abra a url `http://localhost:8000/info` com o teclado tecle Ctrl + A para selecionar
todo o conteúda da página, copie Ctrl+C e cole dentro da página `https://xdebug.org/wizard`

Ele analisará toda a sua máquina e dará todos os passos para você executar a configuração.

Seguindo os passos que me foram retornados:

Baixe `https://xdebug.org/files/xdebug-3.1.0.tgz` e vamos seguir as instruções para
compilá-lo:

```s
Instructions 
Download xdebug-3.1.0.tgz from https://xdebug.org/files/xdebug-3.1.0.tgz

Install the pre-requisites for compiling PHP extensions. These packages are often called 'php-dev', or 'php-devel', 'automake' and 'autoconf'. 

Unpack the downloaded file with 'tar -xvzf xdebug-3.1.0.tgz'
Run: 'cd xdebug-3.1.0'

Run: phpize (See the FAQ if you dont have phpize). 

Run: 'phpize'

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


Run: './configure'
Run: 'make'
Run: 'sudo cp modules/xdebug.so /usr/lib/php/20190902'

Run: 'sudo touch /etc/php/7.4/cli/conf.d/99-xdebug.ini'
Run: 'sudo joe /etc/php/7.4/cli/conf.d/99-xdebug.ini'
Adicione em '/etc/php/7.4/cli/conf.d/99-xdebug.ini' o seguinte conteúdo (sem as aspas):

'zend_extension = xdebug'

Please also update php.ini files in adjacent directories, as your system seems to be configured with a separate php.ini file for the web server and command line. 

Restart PHPs built-in HTTP server (php -S) 
Enabling Features 

Now Xdebug is installed, you can enable its features. Please refer to the dedicated sections in the documentation about information on how to enable and configure these Xdebug features. Where these sections refer to php.ini or similar, please remember to use /etc/php/7.4/cli/conf.d/99-xdebug.ini: 
Development Helpers — help you get better error messages and obtain better information from PHPs built-in functions. 
Step Debugging — allows you to interactively walk through your code to debug control flow and examine data structures. 
Profiling — allows you to find bottlenecks in your script and visualize those with an external tool.
```
# Reinicie o servidor PHP

Run `sudo /etc/init.d/php7.4-fpm restart`

Pare o servidor laravel e reinicie novamente depois cole a página novamente em `https://xdebug.org/wizard`
E você verá:

```s
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

```s
sudo joe /etc/php/7.4/cli/php.ini
```


No `php.ini` acrescente:

obs: Como instalei meu php pelo Ansible, ele não tinha nada referente a extensions
então eu coloquei as configurações na seção Miscellaneous.

```ini
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


Configure o `.vscode/launch.json` como sendo:

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

# Como rodar o Debug?

Para testar você deve iniciar o `php artisan serve` e também apertar
o Debug do VSCode inicializarndo o `Listen for Xdebug`

Como dissemos, temos a rota que mostra o PHPINFO, vá lá e marque um breakpoint
na linha do return, acesse o Browser em `http://127.0.0.1:8000/info` e o VSCode deve parar exatamente no ponto para depuração.

```
Route::get('/info', function () { 
    return phpinfo(); 
});
```














# 5. TODO: `graphql`

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
