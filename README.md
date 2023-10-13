# OneMedia

[English](#English)  
&emsp;[OneMedia](#onemedia)  
&emsp;[Required Programms](#required-programms)  
&emsp;[Installation](#installation)  
&emsp;[Configuration](#configuration)  
&emsp;[Running](#running)  
&emsp;[Recommended extra steps](#recommended-extra-steps)

[Español](#Español)  
&emsp;[OneMedia](#onemedia-1)  
&emsp;[Programas Necesarios](#programas-necesarios)  
&emsp;[Instalación](#instalación)  
&emsp;[Configuración](#configuración)  
&emsp;[Ejecución](#ejecución)  
&emsp;[Pasos extra recomendados](#pasos-extra-recomendados)

# English

## OneMedia

OneMedia is a web application that displays information about films and the users can consult them, create list to save them and vote. This project requires a client and you can find it in [OneMedia](https://github.com/iDelTer/OneMedia).

## Required Programms

[Git](https://git-scm.com/downloads)  
[Composer](https://getcomposer.org)  
[PHP](https://www.php.net/downloads.php) Minimum version 8.2  
[MySQL](https://dev.mysql.com/downloads/mysql/) Minimum version 8.1  
[VSCode](https://code.visualstudio.com/) Or any other IDE  
[TheMovieDB](https://themoviedb.com) An API key

## Installation

To install all the packages required you have to run the next command in the base folder of the proyect

```
composer install
```

You will need to create a database called onemedia or change the database name in the .env file

## Configuration

You need to create a `.env` file with the parameters in `.env.example`.

In the enviroment file you need to change the following parameters

```
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

THEMOVIEDB_TOKEN
```

The token of TheMovieDB must be an access_token and not an API Token.

You must create a database with the name you set up in the enviroment file `DB_DATABASE`.

You need to generate a Laravel Key

```
php artisan key:generate
```

## Running

To create all the tables, you must execute the following command

```
php artisan migrate
```

If you want to run the application

```
php artisan serve
```

Once is running, you need to access through the client in [OneMedia](https://github.com/iDelTer/OneMedia).

## Recommended extra steps

Run this command to create admin and user users

```
php artisan db:seed --class=UserSeeder
```

Admin's credentials are email: `admin@admin.com` and password: `admin`.
User's credentials are email: `user@user.com` and password: `user`.

# Español

## OneMedia

OneMedia es una aplicación web donde se almacena información sobre películas y los usuarios pueden consultarlas, crear listas donde guardarlas y votarlas. Este proyecto requiere un cliente y puedes encontrarlo en [OneMedia](https://github.com/iDelTer/OneMedia).

## Programas Necesarios

[Git](https://git-scm.com/downloads)  
[Composer](https://getcomposer.org)  
[PHP](https://www.php.net/downloads.php) Versión mínima 8.2  
[MySQL](https://dev.mysql.com/downloads/mysql/) Versión mínima 8.1  
[VSCode](https://code.visualstudio.com/) U otro IDE  
[TheMovieDB](https://themoviedb.com) Una clave API

## Instalación

Para instalar todos los paquetes necesarios debes ejecutar el siguiente comando en la carpeta base del proyecto

```
composer install
```

Necesitas crear una base de datos llamada onemedia o cambiar el nombre de la base de datos del archivo .env

## Configuración

Necesitas crear un archivo `.env` con los parámetros de `.env.example`.

En el archivo de enviroment necesitas cambiar los valores de los siguientes parámetros

```
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

THEMOVIEDB_TOKEN
```

El token de TheMovieDB debe ser un access_token y no una API Token.
Debes crear una base de datos con el nombre que has declarado en el archivo enviroment `DB_DATABASE`.

Necesitas generar una clave de Laravel

```
php artisan key:generate
```

## Ejecución

Para crear todas las tablas, debes ejecutar el siguiente comando

```
php artisan migrate
```

Si quieres ejecutar la aplicación

```
php artisan serve
```

Una vez esté ejecutado, debes acceder por el cliente de [OneMedia](https://github.com/iDelTer/OneMedia).

## Pasos extra recomendados

Ejecuta el siguiente código para crear los usuarios admin y user

```
php artisan db:seed --class=UserSeeder
```

Las credenciales de admin son => email: `admin@admin.com` and password: `admin`.
Las credenciales de user son => email: `user@user.com` and password: `user`.
