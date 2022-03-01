# Task for new job.

**_[Laravel](https://laravel.com/) PHP Framework with [Adminator](https://github.com/puikinsh/Adminator-admin-dashboard)_**

## Installation steps:

All you need is to run these commands:

```bash

1. git clone https://github.com/JaloladdinRozmetov/test.git

2. composer install

3. php artisan storage:link

4. cp .env.example .env  # Update database credentials configuration

5. php artisan key:generate  # Generate new keys for Laravel

6. php artisan migrate:fresh --seed   # Run migration and seed users and categories for testing

7. npm install   

8. npm run dev   # To compile assets for dev

9. composer require yajra/laravel-datatables # Install yajra-laravel-datatables
```

## Demo:

- Local demo: `php artisan serve # Check installation (optional)`
  Open browser at [localhost:8000/buyer](http://localhost:8000/buyer)

**Default admin credentials:**

Email: take from database table users

Password: "password"


