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

MySql'in ayaga kalkmasi birkac saniye surebiliyor (bilgisayara gore degisir), migrate calismazsa tekrar tekrar deneyin:

```
./vendor/bin/sail artisan migrate
```

```
./vendor/bin/sail artisan db:seed
```
