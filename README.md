## About This Example

This example shows how to use jobs and React with Laravel.<br/>
[Here is a demonstration](https://laravel-react-example.swarm.cl).<br/>
Administrator user: admin@admin.cl<br/>
Password: admin<br/>
Normal User: user@user.cl<br/>
Password: user<br/>

## Requirements

* [Laravel requirements](https://laravel.com/docs/7.x#server-requirements)
* A relational database such as [MySQL](https://www.mysql.com/) or [PostgreSQL](https://www.postgresql.org/)

## Installation

1. Install PHP (>=7.2.0)
2. Install Composer and Node
3. Clone this repository (or just download the .zip file and unzip it)
4. Open the terminal and go to the project folder
5. Run `composer install` to install project dependencies
6. Run `npm install && npm run dev` to install project dependencies and build the app
7. Install and/or create the relational database that you like to use in the project
8. Copy the file '.env.example' and paste it in the same folder with the name '.env'
9. Add the connection information to your database in the file '.env'
10. Run `php artisan key:generate`
11. Run `php artisan migrate --seed` to create the necessary tables and the default data
12. Run `php artisan serve`
13. Now the project is running in 'http://localhost:8000'

## License

The Laravel framework (and this example) is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
