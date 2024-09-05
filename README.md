<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Pré-requisitos

Antes de começar, verifique se você tem os seguintes softwares instalados:

    PHP (versão 7.4 ou superior)
    Composer
    MySQL ou PostgreSQL (dependendo do banco de dados configurado no arquivo .env)
    Laravel (opcional, pois será instalado via Composer)
Passos para Configuração

    1 - Clone o Repositório (Da forma que Preferir)
    2 - Use o Composer para instalar as dependências do projeto:
    3 - Renomeie o Arquivo .env.example para .env 
    4 - Abra o arquivo .env e configure as credenciais do banco de dados. Aqui está um exemplo de configuração para MySQL:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nome_do_banco
        DB_USERNAME=usuario
        DB_PASSWORD=senha
    Nota: Se estiver usando PostgreSQL, ajuste as configurações para pgsql.
    5 - (Dentro da Pasta no Temrinal) Execute as migrations para criar as tabelas no banco de dados:
        php artisan migrate
    6 - Inicie o Servidor de Desenvolvimento
        php artisan serve
    7 - O projeto estará acessível em http://localhost:8000.
