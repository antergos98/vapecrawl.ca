# Vapecrawl

Vapecrawl.ca is a Laravel 8 and Vue.js vape search engine.

## Requirements
- Docker
- Unix environment or WSL2

## Setup
```bash
docker run --rm -v $(pwd):/opt -w /opt laravelsail/php74-composer:latest composer install && php ./scripts/setup.php
```

This command will
- Setup your .env file
- Generate an application key
- Run migrations and seed the database with dummy data
- Install node dependencies and run `npm run dev`
- Start the development server

Visit http://localhost

## Testing
Tests are run using an in-memory sqlite database
```bash
./vendor/bin/sail test
```
