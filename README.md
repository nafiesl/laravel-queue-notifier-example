# Laravel Queue Notifer Example

This is a sample project for implementing realtime feature for laravel using these packages:

1. Laravel websockets (https://github.com/beyondcode/laravel-websockets)
2. Laravel Echo (https://github.com/laravel/echo)
3. Noty JS (https://ned.im/noty/v2)

## Features

This project is just an example impelemntation, so we will have:

1. A basic job run for 5 seconds in the background, then notify all users after done (without refreshing the browser).
2. A basic job run for 5 seconds in the background, then notify only the current user (privately, also without refreshing the browser).

## Getting Started

### Server Requirements

1. PHP ^7.2 (And meet the [laravel 7.x server requirements](https://laravel.com/docs/7.x/#server-requirements)).
2. MySQL or MariaDB or Sqlite database.

### How to Install

1. Clone the repo: `$ git clone https://github.com/nafiesl/laravel-queue-notifier-example.git`
2. `$ cd laravel-queue-notifier-example`
3. `$ composer install`
4. `$ cp .env.example .env`
5. `$ php artisan key:generate`
6. Create a MySQL/MariaDB/Sqlite database for this project
7. Set the database credential on `.env` file
8. `$ php artisan migrate`
9. `$ php artisan serve` 
10. Open a new terminal tab `$ php artisan queue:work`
11. Open a new terminal tab (again) `$ php artisan websockets:serve`
12. The project is ready to use.

## How to Use

1. Open the web page via browser `http://127.0.0.1:8000` (the given link on How to Install step #9)
2. Register as a new user: `John` (we will be redirected to the `/home` route)
3. Open a new browser with incognito/private mode, go to `http://127.0.0.1:8000`
4. Register as a new different user: `David` (we will be redirected to the `/home` route as well)
5. When John hits the **Run a long job** button
    - John will be redireted back to home
    - John will get a notifier message on the bottom right `Please wait, your request is processing...`.
    - Don't refresh the page, just wait...
    - After 5 seconds, both John and David will get a notifier message `Long run job done after 5 seconds`
    - John and David get the notifier, because this is a public channel for all users.
6. When David hits the **Run a long job** button, the same behavior on point #5 happens for David.
7. When David hits the **Run a long private job** button
    - David will be redirected back to home
    - Davil will get a notifier message on the bottom right `Please wait, your request is processing...`.
    - Don't refresh the page, just wait...
    - After 5 seconds, both David will get a notifier message `Long run private job (for '...') done after 5 seconds`
    - John will not get the notifier, because this is a private channel for David.
8. When John hits the **Run a long private job** button, the same behavior on point #7 happens for John.

## License

This sample project is a free and open-source under [MIT license](LICENSE).
