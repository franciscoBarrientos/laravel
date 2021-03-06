## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

Sistema de gestión de pacientes y control de abastecimiento

#VIDA ANIMAL

## Instalación

+ Después de descargar el proyecto entramos a este.

        $ cd nombreRepositorio

+ Ejecutamos el siguiente comando.

        $ composer install
    
+ Modificamos el nombre del archivo __.env.example.__ por __.env__ y agregamos nuestras credenciales.

+ Agregar en .env:

		MAIL_DRIVER=smtp
		MAIL_HOST=smtp.gmail.com
		MAIL_PORT=465
		MAIL_USERNAME=
		MAIL_PASSWORD=
		MAIL_ENCRYPTION=ssl

		NOCAPTCHA_SECRET=
		NOCAPTCHA_SITEKEY=

		ENTERPRISE_NAME=Veterinaria Vida Animal
		ENTERPRISE_ADDRESS=Libertador Bernardo O'Higgins 2041
		ENTERPRISE_CITY=Maipú - Santiago
		ENTERPRISE_PHONE=2 2780 1733
		FOOTER=Consultas a Domicilio, Cirugía, Destartrajes, Flores de Bách.

+ Ejecutamos las migraciones.

        $ php artisan migrate

+ Por ultimo solo debemos generar una key para nuestra app.

        $ php artisan key:generate

+ Listo ya podemos ejecutar el proyecto.

        $ php artisan serve