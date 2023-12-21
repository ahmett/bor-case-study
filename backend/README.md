## Gereksinimler

- Docker

## Komutlar

Projeyi kurmak icin:

```
composer install && \
cp .env.example .env && \
php artisan key:generate && \
php artisan sail:install --with=mysql
```

Projeyi ayaga kaldirmak ve fake data ile doldurmak icin, sirasiyla:

```
./vendor/bin/sail up -d
```

```
./vendor/bin/sail artisan migrate
```

```
./vendor/bin/sail artisan db:seed
```
