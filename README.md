## Usage

Setting up your development environment on your local machine:

Clone the repository

```
git clone https://jericjunee@bitbucket.org/jericjunee/stuckoverflaw.git
```

Change the directory to the repository

```
cd stuckoverflaw
```

Generate the `.env` from `env.example`

```
cp .env.example .env
```

Install dependencies

```
npm install
composer install
```

Generate app keys, clear cache and routes

```
php artisan key:generate
php artisan cache:clear
php artisan config:clear
```

Create a database

```
mysql
create database stuckoverflow;
exit;
```

Setup your database credentials in the .env file.

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=stuckoverflow
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables and seed the default admin account.

```
php artisan migrate --seed
```

The default account credentials is:

```
email: admin@stuckoverflaw.com
password: 1234
```

Run the project

```
php artisan serve
```
