# PVEB17_Platform_for_learning_Serbian
Web platform which will enable learning Serbian language through a number of lessons which are all theme connected. This platform is meant for young people in foreign countries which would like to keep in touch with both culture and language from their homeland. 

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report

# run unit tests
npm run unit

# run all tests
npm test

# add new packages with 
npm install package_name --save
```

For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).

# How to start copied laravel project
``` bash
composer update  
composer install  
cp .env.example .env  
#configure your .env file  
php artisan key:generate  
#restart apache  
php artisan migrate #repeat this until you have no errors and you get "nothing to migrate" message *up to 20 times :( *
php artisan passport:install  
```

