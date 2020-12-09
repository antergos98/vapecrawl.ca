<?php

exec('cp .env.example .env');
exec('./vendor/bin/sail up -d');
exec('./vendor/bin/sail artisan key:generate');
exec('./vendor/bin/sail artisan migrate --seed');
exec('./vendor/bin/sail npm install');
exec('./vendor/bin/sail npm run dev');
exec('./vendor/bin/sail down');
exec('./vendor/bin/sail up');
