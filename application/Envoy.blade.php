@setup
if (isset($production)) {
    $path = '/home/zofe/public_html/rapyd.com/5.6';
    $branch = isset($branch) ? $branch : "master";  //un domani "production"
    $remoteServer = 'root@rapyd.com';
} else {
    $path = '/home/zofe/public_html/rapyd.com/5.6'; //un domani metto percorso di staging
    $branch = isset($branch) ? $branch : "master";
    $remoteServer = 'root@rapyd.com';
}
@endsetup


@servers(['production' => $remoteServer, 'web' => 'root@rapyd.com'])


{{--@task('deploy')--}}
    {{--cd /home/zofe/public_html/rapyd.com/5.6--}}
    {{--git pull origin master--}}
{{--@endtask--}}

@task('rapyd-update')
cd {{ $path }}
composer update zofe/rapyd
@endtask

@task('fetch')
cd {{ $path }}
git fetch origin {{ $branch }}
@endtask

@task('pull')
cd {{ $path }}
git checkout {{ $branch }}
git pull origin {{ $branch }}
@endtask

@task('migrate')
cd {{ $path }}
php artisan migrate --force
@endtask

@task('install')
cd {{ $path }}
composer install -o
@endtask

@task('clear')
cd {{ $path }}
php artisan clear-compiled
{{--php artisan twig:clean--}}
php artisan view:clear
php artisan route:clear
php artisan config:clear
@endtask

@task('optimize')
cd {{ $path }}
{{--php artisan optimize--}}
{{--php artisan twig:clean--}}
php artisan route:cache
php artisan config:cache
@endtask

@task('up')
cd {{ $path }}
php artisan up
@endtask

@task('down')
cd {{ $path }}
php artisan down
@endtask

@macro('deploy')
fetch
down
pull
install
{{--migrate--}}
clear
{{--optimize--}}
up
@endmacro