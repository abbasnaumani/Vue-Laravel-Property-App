<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://kodestudio.net/wp-content/uploads/2021/03/kodestudio-logodarkblue.svg" width="250"></a></p>

## Setup Guide for Laravel + Vue3 Real Estate Project

Clone Project From github
```text
git clone https://github.com/abbasnaumani/property.git
```
###1. Setup local Database and update .env

Make Database And set your database credentials. 
Like DB Name and password in .env file.

Make .env file in your root directory and paste below code.

```text
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:5FgS2TCm/MxxSlJxxRsK3kV33voGpa24nRA9xIbCTu9VzHEx
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YourDatabaseName
DB_USERNAME=UserName
DB_PASSWORD=yourPassword

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

###2. Install Composer ```v2.1.3``` on your system and then run below commands

Then Install your Composer by using this command.

```text
composer install
php artisan migrate --seed
```

###3. Install node ```v15.11.0``` in your system.

###4. Then Install yarn ```v1.22.10``` and run these commands.

```text
yarn install 
yarn run dev
```

###5. Run Your Project.
Now run command to start your backend server.
```text
php artisan serve
```
Now run command to start your frontend server.
```text
yarn run watch
```
