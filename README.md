<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About App

This application was developed for a job interview. The problem statement is defined below:

Build a simple application using Laravel and your preferred css frontend stack, Bootstrap or anything you like, use Vue if you want, but this is not important, do not overcomplicate, we are focusing on backend skills.
 
The goal of the application is to search Pixabay photos and display the first page of results.

Pixabay allows you to register for free Access for API with a 5000 requests limit per hour, but needs to cache already made requests for 24h (from term and conditions).
Under each photo display a link of Save, that would save in local storage a copy of the best quality image and create additionally a smaller version  of it as thumbnail and save it’s info in the DB.

If same search is done within less than 24h, it should be retrieved from cache and should post a message above the results with how much time there is until cache expires for this search.

Have another page, example `/saved`, that would list saved photos, using the saved info from db.

Things to consider:

Use Guzzle for http communication with the API (https://laravel.com/docs/8.x/http-client)
Make sure you cache api communication (https://laravel.com/docs/8.x/cache)
When an save is triggered, use queues to trigger the process (https://laravel.com/docs/8.x/queues) and just display a notification (can be a JS alert) that save will happen.

## Important things to consider

To build the code, Laravel 8 and PHP 7.4 were used, as well as the help of MySQL

The code was made using image manipulation tools, so it is necessary that PHP has the extension php7.4-gd

For the data cache, Redis was used, so you should be able to access Redis for the code to work.

Laravel's own file was used for the queue;

it is worth remembering that the pixabay key must be changed in the ".env" file, the PIXABAY_KEY key must be used for this

Em caso de dúvidas contactar o criador pelo email: lucasfranson27@gmail.com

## License

This App was make for Lucas, if you use this code please reference the author.
