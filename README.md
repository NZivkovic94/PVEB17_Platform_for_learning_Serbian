# :books: Platform for learning Serbian language
Web platform which will enable learning Serbian language through a number of lessons which are all theme connected. This platform is meant for young people in foreign countries which would like to keep in touch with both culture and language from their homeland. Platform is developed using [Vue.js](https://vuejs.org/) and [Laravel](https://laravel.com/)


This application is developed as a project for Web development course at the [Faculty of Mathematics](http://www.matf.bg.ac.rs/eng/) in Belgrade, Serbia.

## :computer: Getting Started

These instructions will get you a copy of the application up and running on your local machine. 
### Laravel setup
``` bash
composer update  
composer install  
cp .env.example .env  
configure your .env file
php artisan key:generate  
php artisan migrate #repeat this until you have no errors and you get "nothing to migrate" message *up to 25 times :( *
php artisan passport:install  
```

### Vue.js build
``` bash
npm install						# install dependencies
npm install package_name --save	# add new packages 
```
For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).

### :rocket: Run
``` bash
# activate Apache and Database
npm run dev			# serve with hot reload at localhost:8080
npm run build		# build for production with minification
```

## :tv: Demo
![demo](https://github.com/NZivkovic94/PVEB17_Platform_for_learning_Serbian/blob/master/assets/Demo.gif)

## :chart_with_upwards_trend: Database initialization
Awesome data for initializing your database so this app looks great.

``` bash
# deleta all data ( drop everyting and have a clean database )   
  php artisan migrate    	#repeat until "nothing to merge"
  php artisan passport:install  

# run the app, go to SignUp and make 3 users
  1st is going to be admin
  2nd is going to be proffesor 
  3rd is going to be a student
  but don't change the database!

# go to phpMyAdmin
  click on the database
  click on SQL
  copy everyting from test_data.sql and click Go.

```

## :wrench: Built using
This application is built using Javascript framework - Vue.js and PHP framework - Laravel.
* [Vue.js](https://vuejs.org/) -  frontend
* [Laravel](https://laravel.com/) - backend

## :mortar_board: Authors

* **Dušica Krstić** 	-  [dmkrstic](https://github.com/dmkrstic)
* **Đorđe Pantelić** -  [djolf94](https://github.com/djolf94)
* **Nikola Dimić** -  [dimaria95](https://github.com/dimaria95/)
* **Aleksandar Muljaić** -  [Aleksandar-M](https://github.com/Aleksandar-M)
* **Nikola Živković** -  [NZivkovic94](https://github.com/NZivkovic94)

## :book: License

This project is licensed under the MIT License.
 
