# Vapecrawl

Vapecrawl.ca is a Laravel 8 and Vue.js vape search engine.

## Requirements
- Docker
- Unix environment or WSL2

## Setup
```bash
cp .env.example .env
docker run --rm -v $(pwd):/opt -w /opt laravelsail/php74-composer:latest composer install
./vendor/bin/sail build
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate 
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

Visit http://localhost

## Useful commands
```bash
# Run npm watcher
./vendor/bin/sail npm run watch

# Run tests
./vendor/bin/sail test
```
