# Mockingbird v.2022.0.1

## Unique Packages For This Build
```json
{
    "require": {
        "laravel/framework": "^8.75",
        "laravel/sanctum": "^2.11",
        "league/flysystem-aws-s3-v3": "^1.0",
        "spatie/eloquent-sortable": "^3.11",
        "spatie/laravel-tags": "^2.7",
        "tinify/tinify": "^1.5"
    },
    "require-dev": {
        "laravel/breeze": "^1.7"
    }
}
```
## Installation Steps
It may be helpful to know what installation steps were taken to bootstrap this project, for example, if we need to re-do something.

Following https://laravel.com/docs/8.x/installation#installation-via-composer, this project was created with the following steps:

### Perform Basic Install With Composer
With PHP Composer installed (https://getcomposer.org/download/), run the `create-project` command on the `laravel/laravel` package with the name `mockingbird`:

```bash
composer create-project laravel/laravel mockingbird-2022

cd mockingbird-2022
```

#### Running a Local Server
To start Laravel's built-in local development server, run:
```bash
php artisan serve
```
You can also use a server of your choice to work locally. [MAMP](https://www.mamp.info) (free and paid versions) is a good place to start for Mac users.

**Note Laravel's server requirements: https://laravel.com/docs/8.x/deployment#server-requirements. The current version uses PHP>=7.3.**

#### Apply Version Control

Apply version control using `git` and add all files. Note Lavarel has included a `.gitignore` which will exclude files and used for setting up your local environment. These files and directories should also be excluded from the deployment bundle when the time comes.

### Configure Your Local Database

Create a database on your local server. Laravel is database-agnostic, so you can develop using whatever you want. (See supported databases at https://laravel.com/docs/8.x/database#introduction.) You will run migrations in a later step to automatically generate tables and seed the database.

Update the following lines in your `/.env` file:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=local_database
DB_USERNAME=local_username
DB_PASSWORD=local_password
```
(NB. Your local `/.env` file should never be added to Git or deployed remotely.)

Now use `artisan` to run initial migrations:

```
php artisan migrate
```

This will configure your database with several tables related to managing users.


### Install Laravel Breeze

https://laravel.com/docs/8.x/starter-kits#laravel-breeze:

>Laravel Breeze is a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. Laravel Breeze's default view layer is made up of simple Blade templates styled with Tailwind CSS.

Once you have run your database migrations, use Composer to add the Laravel Breeze installer to your dev dependencies.

```
composer require laravel/breeze --dev
```

>After Composer has installed the Laravel Breeze package, you may run the `breeze:install` Artisan command. This command publishes the authentication views, routes, controllers, and other resources to your application. Laravel Breeze publishes all of its code to your application so that you have full control and visibility over its features and implementation. After Breeze is installed, you should also compile your assets so that your application's CSS file is available:

```
php artisan breeze:install

npm install
npm run dev
```

> Next, you may navigate to your application's `/login` or `/register` URLs in your web browser. All of Breeze's routes are defined within the `routes/auth.php` file.

### Configure a Mail Service
Laravel Breeze also creates an interface for `/forgot-password` which will send email. A valid service needs to be configured. Like with databases, Laravel's interface is agnostic of what notification system you choose and will seamlessly convert between them.

Update the following lines of your `.env` file:

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```
