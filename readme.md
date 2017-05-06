## Requirements

* php5.6 or higher
* MySql
* Composer
## PreInstall

* Download and install **XAMPP** -> [Download](https://www.apachefriends.org/download.html)
* Download and install **Composer** -> [Download](https://getcomposer.org/download/)

## Install

1. Create an **empty** Database. 
1. Create the directory **cache** into **\bootstrap**
1. Create **.env** file into **QueueManager**. Then copy and paste **.env.example** content into .env. 
After that change **DB_DATABASE=** and **DB_USERNAME=** from **homestead** to your data and 
**DB_PASSWORD=** from **secret** to your password.
1. From a command line go to QueueManager path and run **composer update**. Then run **php artisan serve** and when server
starts press Ctrl+C to stop it.
1. Go to **\app\storage** and create **app**, **framework** and **logs** directories.
Then go to the **framework** folder that you just create and create **cache**, **sessions** and
**views** subfolders.
1. Run **php artisan key:generate**, **composer update** again and **php artisan serve**.
1. Open a browser and type: **http://localhost:8000/**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
