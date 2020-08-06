# Vapecrawl

Vapecrawl.ca is a Laravel/Vue.js vape search engine.

## Requirements
- Meilisearch (0.13.0)
- Node.js (currently using 12.18.3)
- PHP >= 7.4
- Composer

## Setup
```bash
cp .env.example .env
php artisan key:generate
composer install
php artisan migrate
php artisan db:seed --class=VendorsTableSeeder
npm install
npm run dev
php artisan serve
```

Visit localhost:8000 :tada:

## Testing
Tests are run using an in-memory sqlite database
```bash
php artisan test
```

## Import all products
If you want to import products you'll need to run `php artisan:products`

This command will loop through each vendor and instantiate the proper "Importer" class, then call import on it.
The import command will either consume an API or scrape vendor's url to extract products info.

**This command is executed on the server each day at 02:00 AM**

## Code analyzer
```bash
./vendor/bin/phpstan analyse --memory-limit=2G
```
