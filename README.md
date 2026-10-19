# Order System

An order management web application built with **Laravel** and **Vue 3**, backed by MySQL.

## Tech stack

- PHP 8.1, Laravel
- Vue 3, Vite
- MySQL

## Getting started

### Prerequisites

- PHP 8.1+
- Composer
- Node.js and npm
- MySQL

### Installation

```bash
git clone https://github.com/Imranali2726/orderSystem.git
cd orderSystem
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Create a MySQL database and update `.env`:

```env
DB_DATABASE=order_system
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations and seeders, then start the app:

```bash
php artisan migrate --seed
npm run dev
php artisan serve
```

The app will be available at http://127.0.0.1:8000.
