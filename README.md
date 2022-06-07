# Property Finder
> Advertise and find properties.

Property finder is a full-stack web app that allows users to advertise their properties whether it was apartments or villas or lands in addition to search and find properties they are looking for.  

## Built With
* [PHP](https://www.php.net/) & [Laravel](https://laravel.com/)
* [MySQL](https://www.mysql.com/)
* [Vue.js](https://v3.vuejs.org/) & [Inertia](https://inertiajs.com/) 
* [TailwindCSS](https://tailwindcss.com/)

## App Screenshots
![Home](/app-screenshots/apartments-1.PNG)
![Home 2](/app-screenshots/apartments-2.PNG)
![Apartments Without Ads](/app-screenshots/apartments-without-ads.PNG)
![Apartment Details 1](/app-screenshots/apartment-detail-1.PNG)
![Apartment Details 2](/app-screenshots/apartment-detail-2.PNG)
![User Ads](/app-screenshots/user-ads-without-category-zoom-out.PNG)
![Login](/app-screenshots/login.PNG)

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

### Preparations

1. Create .env file in the root folder then copy all environment variables from .env.example file.

2. Set the application key

    ```sh
    php artisan key:generate
    ```

3. Compiling Assets

    ```sh
    npm run watch
    ```

4. Create a virtual host for the project.

5. Create database for the project then configure environment variables for the database you have created.

6. Initialize database

    ```sh
    php artisan migrate_in_order --seed
    ```
    > *Description*: <br>
        Execute the migrations in the order specified in the file app/ Console/Comands/MigrateInOrder.php.

    > *Options*: <br>
        -r, --reset (Rollback all database migrations) <br>
        -s, --seed (Seed the database with necessary records)

7. Create the symbolic links configured

    ```sh
    php artisan storage:link
    ```

8. Reset password functionality 
    > Need to configure an SMTP server or integrate with email service like (mailgun, postmark, ....)

### Testing

* Create dummy data for your database 

    ```sh
    php artisan db:seed --class TestSeeder
    ```

## License
[MIT](https://choosealicense.com/licenses/mit/)


    
