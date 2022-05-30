![gamestore_logo](/resources/img/logo.png)

# Gamestore

This project was made for educational purpose and it's not intended for commercial use.

## Laravel

This project was made using Laravel framework.   
Find more information on https://laravel.com

## Voyager

Voyager is used as admin panel in this project.  
You can find out more on their website https://voyager.devdojo.com/

## Instalation:

- Clone repository

```
$ git clone https://github.com/code-alone7/lft-gamestore.git
```

- Run composer

```
$ composer install --optimize-autoloader --no-dev
```

- Setup database connection in .env file

```  
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

- Migrate tables and seed some technical data

```
$ php artisan migrate --seed
```

- Seed demo data

```
$ php artisan db:seed FakeDataSeeder
```

- Setup mail data in .env file

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
```

## Server Requirements

- PHP >= 8.0
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

See more on https://laravel.com/docs/9.x/deployment