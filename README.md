# Ademon

## Overview
Ademon is a classified ad application that allows users to explore a wide range of ads. It provides a platform for buyers and sellers to connect and engage with classifieds in various categories.

## Quick Look
| ![Home Page](./screenshots/homePage.png?raw=true) | 
|:-------------------------------------------------:| 
|                    *Home Page*                    |


| ![Account Page](./screenshots/accountPage.png?raw=true) | 
|:-------------------------------------------------------:| 
|                     *Account Page*                      |

## Features
- Browse through a diverse collection of ads.
- Filter ads by category and location.
- View detailed information about each ad, including description, price, location, and contact information.
- Secure user registration and authentication.
- Manage posted ads through user accounts.

## Technologies Used
- Laravel
- HTML / Sass
- MySQL

## Installation
1. Install dependencies:
```
composer install
```

2. Create a `.env` file:
```
cp .env.example .env
```

3. Generate an application key:
```
php artisan key:generate
```

4. Add your app key and configure your database settings in the `.env` file:
```
APP_KEY=your_app_key
DB_CONNECTION=mysql
DB_HOST=your_db_host
DB_PORT=your_db_port
DB_DATABASE=your_db_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

5. Run migrations and seed the database:
```
php artisan migrate --seed
```

6. Start the development server:
```
php artisan serve
```

7. Visit http://localhost:8000 in your browser to access Ademon.
