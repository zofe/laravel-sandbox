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


### optional steps (from php-fpm container)
frontend stack (vue,scss compiler,etc..)
```
docker-compose exec php-fpm bash
npm i
```

migrations (users, auth/login)
```
# laravel .env :
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=sandbox_db
DB_USERNAME=sandbox
DB_PASSWORD=sandbox

# run migrations
php artisan migrate
```


### branches

- master (just docker-compose and index.php, a phpinfo)
- laravel-7 (clean laravel-7 installation)

