# Property Finder
> Advertise and find properties.

Property finder allows users to advertise their properties whether was apartments or villas or lands and finding properties.

## Built With
* [PHP](https://www.php.net/) & [Laravel](https://laravel.com/)
* [MySQL](https://www.mysql.com/)
* [Vue.js](https://v3.vuejs.org/) & [Inertia](https://inertiajs.com/) 
* [TailwindCSS](https://tailwindcss.com/)

## Getting started

### Prerequisites 
* Nodejs [download](https://nodejs.org/en/)
* Composer [download](https://getcomposer.org/download/)
* XAMPP environment (*optional*) [download](https://www.apachefriends.org/download.html)

### Installation

1. Clone the repo 

   ```sh
   git clone https://github.com/IslamAliMuhammad/property-finder-app.git
   ```

2. Installing dependencies

    *   ```sh
        npm install
        ```

    *   ```sh
        composer install
        ```

    *   ```sh
        php artisan key:generate
        ```
        
3. Compiling Assets

    ```sh
    npm run watch
    ```
### Preparations

1. Create a virtual host for the project.

2. Create database for the project.

3. Configure .env file.

4. Initialize database

    ```sh
    php artisan migrate_in_order 
    ```
    > *Description*: <br>
        Execute the migrations in the order specified in the file app/ Console/Comands/MigrateInOrder.php.

    > *Options*: <br>
        -r, --reset (Rollback all database migrations) <br>
        -s, --seed (Seed the database with necessary records)

5. Create the symbolic links configured

    ```sh
    php artisan storage:link
    ```

6. Reset password functionality 
    > Need to configure an SMTP server or integrate with email service like (mailgun, postmark, ....)

### Testing

* Create dummy data for your database 

    ```sh
    php artisan db:seed --class TestSeeder
    ```

## License
[MIT](https://choosealicense.com/licenses/mit/)


    
