# Vapecrawl

Vapecrawl.ca is a Laravel 8 and Vue.js vape search engine.

## Requirements
- Docker
- Unix environment or WSL2

## Setup
```bash
cp .env.example .env
docker run --rm -v $(pwd):/opt -w /opt laravelsail/php74-composer:latest composer install
./vendor/bin/sail up -d
./vendor/bin/sail exec laravel.test bash -c "php artisan key:generate && php artisan migrate --seed && npm install && npm run dev"
```

Visit http://localhost

## Useful commands
```bash
# Run npm watcher
./vendor/bin/sail npm run watch

# Run tests
./vendor/bin/sail test
```
