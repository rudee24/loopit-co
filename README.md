# loopit-co


#loopit-backend

- This directory contains Laravel Backend
- Inside this directory execute "composer install"
- Add your db credentials to .env file and execute "php artisan config:cache"
- After that execute "php artisan db:seed"
- In .env file update SANCTUM_STATEFUL_DOMAINS to client domain


#loopit-client 

- This contains Vue 3 based client side 
- Inisde this directory execute "npm install"
- Inside src/Api/Api.js, update baseURL to match your Laravel server URL
- Run the app, use "admin@loopit.co" as username and "password" as password.

