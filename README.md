# Blog-Challenge-with-Laravel-5.4
This blog was created using Laravel 5.4
## Disclaimer
This blog was created with the sole intent for public sharing. No part of this code-base is harmful to anyone, nor designed with malicious intent. You are therefore free to copy, contribute to and / or share as you please at your own risk. The original author of this blog will not be resposible for any software, system, personal damages or loss of business damages that may occur from choosing to copy this code.
As long as you are having fun with Laravel, enjoy!!
## Installation
- Install `LAMP stack` to run your application locally.
- Install `composer` by following the instructions here: [Download & Install Composer](https://getcomposer.org/download/)
- Use composer to install Laravel 5.4 as per the documentation here: [Laravel 5.4 Installation](https://laravel.com/docs/5.4/installation)
- Run `composer update --no-scripts` to force composer to skip the execution of scripts defined in the composer.json file.
- Run `php artisan key:generate` to generate an authentication key for the application.
- Run `php artisan make:auth` to create the login fascility
- Create the `Post` model by running this code which creates the `controller`, the database `migrations` and the `resource` section: `php artisan make:model Post --controller --migration --resource`
- Go to the migration file and update the schema accordingly.
- Edit the `.env` file in the document root to correctly reflect your database connection details:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=#yourDatabaseName#
DB_USERNAME=#username#
DB_PASSWORD=#password#
```
- Run `php artisan migrate` to carry out the migration and build the tables.
- Run `php artisan serve` to serve up the application.
- Enjoy!

## Blog Features

### Non Admin / Logged-in users:
- Can only view the Blog home page and see only `active` blogs.
- Cannot manage an existing blog
- Can register, login and start blogging.
- Can view the *entire blog* by clicking the *blog title*.

### Admin / Logged-in Users:
- Can do all the above.
- Can view **All** blogs regardless of the blogs **Active Status**.
- Can *manage blogs*. They have the rights to:
  - **Create** a blog
  - **Edit** blog
  - **Delete** a blog
  - Set a blogs *Active Status*
## Pending / Additional Improvements

Due to time constraints, and the need to build a simple blog using `Laravel 5.4`, the following features were not done.

- Database seeding
- Automation Testing
- Dynamic Links. The current implemented logic needs more work. Although it works for the purposes of this project.
- Social media likes / commenting / counts plugins etc.

Enjoy!