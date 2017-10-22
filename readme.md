# Gitstadistics
A Laravel interface for viewing your repositories stadistics.

**NOTE: This project is no longer mantained. In fact, is was never mantained... :smile:***

## Features:

- Multi-user support: You can add all the users you want. In fact, anyone with a Github account can use it if you expose it on the internet!
- Uses Github Style: Gitstadistics uses [PrimeCSS](http://primercss.io/) and [Octicons](https://octicons.github.com) for having a github-like style!
- Caching: Gitstadistics uses notification caching to reduce load time and provide you an awesome experience!

## Requirements:

- PHP >= 5.6.4
- Composer
- MySQL
- MySQL PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation:

1. Clone or download this repo to somewhere on your server.
2. Rename .env.example to .env and fill the database settings.
3. Run ```composer install```, ```php artisan key:generate``` and ```php artisan migrate```.
4. [Create a Github OAuth app](https://github.com/settings/applications/new) using ```[YOUR_URL]/callback``` as the **Authorization callback URL** and add them to ```.env```.
5. Enjoy!

## Credits:

- [PHP](https://php.net) - For his awesome work on developing PHP.
- [MySQL](https://mysql.com) - For that awesome DB software.
- [Laravel](https://laravel.com) - For this awesome framework.
- [Github](https://github.com) - For his [API](https://developers.github.com/v3) and the awesome people at [Github Support](https://github.com/contact).
- [KNP Labs](https://knplabs.com) - For his awesome [php-github-api](https://github.com/KnpLabs/php-github-api).
- [Graham Campbell](https://gjcampbell.co.uk/) - For his awesome [Laravel Github](https://github.com/GrahamCampbell/Laravel-GitHub).
