## Gereksinimler

- Docker

## Komutlar

Projeyi kurmak icin:

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs && \
    cp .env.example .env && \
    php artisan key:generate && \
    php artisan sail:install --with=mysql
```

Projeyi ayaga kaldirmak ve fake data ile doldurmak icin, sirasiyla:

```
./vendor/bin/sail up -d
```

MySql'in ayaga kalkmasi birkac saniye surebiliyor (bilgisayara gore degisir), migrate calismazsa tekrar tekrar deneyin:

```
./vendor/bin/sail artisan migrate
```

```
./vendor/bin/sail artisan db:seed
```
