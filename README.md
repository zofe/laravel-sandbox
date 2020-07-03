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


### crud 

making making model & create table, generating controller, register routes, 

```
docker-compose exec php-fpm bash

# generating model
php artisan make:model Contact --migration

# migrations/xxxxx_create_contacts_table.php
.. adding
$table->string('first_name');
$table->string('last_name');
$table->string('email');
$table->string('job_title');
$table->string('city');
$table->string('country');
.. then
php artisan migrate

# in Contact.php model

...
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'city',
        'country',
        'job_title'       
    ];
...

php artisan make:controller ContactController --resource

# routes/web.php
Route::resource('contacts', 'ContactController');

# routes/api.php
Route::apiResource('contacts', 'ContactController');

# in ContactController.php

.. store method with validation & new model
 public function store(Request $request) {
    $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>'required'
    ]);

    $contact = new Contact([
        'first_name' => $request->get('first_name'),
        'last_name' => $request->get('last_name'),
        'email' => $request->get('email'),
        'job_title' => $request->get('job_title'),
        'city' => $request->get('city'),
        'country' => $request->get('country')
    ]);
    $contact->save();
    return redirect('/contacts')->with('success', 'Contact saved!');
 }
 
 public function create()
 {
     return view('contacts.create');
 }
```

### api & swagger
```
./vendor/bin/openapi --output ./public/api/swagger.json --exclude tests --exclude storage --exclude vendor ./app/Http/Controllers/API/

```


### branches

- master (just docker-compose and index.php, a phpinfo)
- laravel-7 (clean laravel-7 installation)
- laravel-7-crud (laravel-7 crud)

