# Vapecrawl

![Torch CI](https://torchci.com/projects/6f6acda5-312f-4c7e-b97d-a3617495671e/status?branch=master)

Vapecrawl.ca is a Laravel 8 and Vue.js vape search engine.

## Requirements
- Docker
- Unix environment or WSL2
- Node and npm installed locally

## Initial setup
```bash
cp .env.example .env
docker run --rm -v $(pwd):/opt -w /opt laravelsail/php74-composer:latest composer install
./vendor/bin/sail build
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate 
./vendor/bin/sail artisan migrate --seed
npm install
npm run dev
```

## Start the project
```bash
./vendor/bin/sail up -d
npm run watch
```

Visit http://localhost

## Useful commands
```bash
# Run npm watcher
./vendor/bin/sail npm run watch

# Run tests
./vendor/bin/sail test
```

## Update Meilisearch on the server
1. Go on Ploi.io and stop the two daemons
2. SSH into the server and `rm -rf ~/meilisearch/`
```bash
    sudo rm -rf /usr/bin/meilisearch
    curl -L https://install.meilisearch.com | sh
    mv ./meilisearch /usr/bin/
    # Test if meilisearch is working
    meilisearch --version
    cd ~/vapecrawl.ca
    php artisan scout:import App\\Models\\Product
    cd ~/staging.vapecrawl.ca
    php artisan scout:import App\\Models\\Product
```

Restart the daemons on Ploi and test if search is still working on staging and prod
