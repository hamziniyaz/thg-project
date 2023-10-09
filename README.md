
# Intial setup
## install laravel

    $ composer global require "laravel/installer"

Edit  ~/.profile and  "~/.composer/vendor/bin" to PATH

    $ laravel new project-name; cd project-name;

list all methods

    $ php artisan list

get help

    php artisan --help "command"

# User Authentication
Based on https://laracasts.com/series/laravel-5-from-scratch/episodes/13

    $ php artisan make:auth
    
# configure db settings

Edit .env to match your settings

Add key 'unix_socket' in config/database.php for MAMP environment

    'mysql' => [
        'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
    ],
    
Then update the db etc.
    
    $ php artisan migrate
    
# Mail Config

Update .env see http://stackoverflow.com/questions/34169038/laravel-wont-pass-my-domain-to-the-mailgun-driver-so-i-cant-send-mail#34170106
    
    MAIL_DRIVER=mailgun
    MAILGUN_DOMAIN=sandboxc893c………5079.mailgun.org
    MAILGUN_SECRET=key-………
    
This is used in config/services.php

Update config/mail.php

        'from' => ['address' => 'support@ooo.com', 'name' => 'OOO Support'],
        
# Frontend

Change to less: gulpfile.js https://laracasts.com/series/laravel-5-from-scratch/episodes/6
    
    elixir(function(mix) {
        mix.less('app.less');
    });
    
Bumped up and chnaged versions in package.json

    "devDependencies": {
        "gulp": "^3.9.1",
        "laravel-elixir": "^6.0.0-4",
        "bootstrap-less": "^3.3.8"
    }
    
and 

    $ npm install
