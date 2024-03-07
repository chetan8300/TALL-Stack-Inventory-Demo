<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Tall Stack Sample Application

CRUD Operation of Vehicle Parts

Sample of Part stored in database:
```javascript
{
  "part_number": "NISSAN-GTR-R35-002",
  "part_name": "Rear Bumper",
  "quantity": 8,
  "bin_location": "A-02",
  "active": true,
  "unit_price": 1300.00
}
```

## Prerequisites

- PHP: 8.3
- Node: 18.12.0 or greater
- Composer: latest version
- MySQL: 8.3.0

## Installation

- Install PHP Dependencies: `composer install`
- Install Node Dependencies: `npm install`
- Copy `.env.example` file to `.env`
- Generate Key: `php artisan key:generate`
- Make sure to set **database** `username` and `password` to `.env` file

## Build

- Build JS and CSS using node: `npm run build`
- Start Watch on JS and CSS: `npm run dev`
- Create Database and Migration Tables: `php artisan migrate`

## Run Project

- Watch or build on node modules is not required as they are already built but you can start watch using above command if you want.
- Open PHP Server: `php artisan serve`
