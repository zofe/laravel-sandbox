## laravel sandbox


just a dockerized skeleton/sandbox to develop laravel apps

### requirements

- docker (and docker-compose cli)

### usage

- fork o download the repo to make you own laravel project

- then raise docker containers (nginx, php, mysql)
```
docker-compose up -d
```

- then enter in php-fpm container and download preferred version of laravel
```
docker-compose exec php-fpm bash

laravel new      #or alternatively:
composer create-project laravel/laravel . "7.*" --prefer-dist

cp .env.example .env
php artisan key:generate
```


laravel is ready on http://localhost

### branches

- master (just docker-compose and index.php, a phpinfo)
- laravel-7 (clean laravel-7 installation)
composer create-project laravel/laravel . "6.*" --prefer-dist