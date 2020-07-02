## laravel sandbox


just a dockerized skeleton/sandbox to develop laravel apps

### requirements

- docker (and docker-compose cli)

### usage

- git fork o download  to make you own laravel project

- then
```
docker-compose up -d
docker-compose exec php-fpm bash
```

- in php-fpm container you can run 
```
laravel new
```

