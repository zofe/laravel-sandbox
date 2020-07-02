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

laravel new
cp .env.example .env
php artisan key:generate
```


laravel is ready on http://localhost