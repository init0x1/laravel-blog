# Laravel Blog API

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About This Project

This is a Laravel-based RESTful API for a blog application with user authentication and post management capabilities. Built with Laravel 12, this API provides a solid foundation for building a full-featured blog platform.

## Features

- User authentication (register, login, logout) using Laravel Sanctum
- Post management (create, read, update, delete)
- Authorization policies for post operations
- API resources for consistent response formatting
- Pagination for post listings

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL/PostgreSQL database
- Node.js and NPM (for frontend assets)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/init0x1/laravel-blog.git
```
```
cd laravel-blog
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install NPM dependencies:

```bash
npm install
```

4. Create and configure your environment file:

```bash
copy .env.example .env
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Configure your database in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run database migrations:

```bash
php artisan migrate
```

8. Start the development server:

```bash
php artisan serve
```

## API Endpoints

### Authentication

- `POST /api/register` - Register a new user
  - Required fields: name, email, password, password_confirmation
  
- `POST /api/login` - Login and get access token
  - Required fields: email, password

- `POST /api/logout` - Logout and invalidate the access token

### Posts

- `GET /api/posts` - Get all posts (paginated)
- `GET /api/posts/{id}` - Get a specific post
- `POST /api/posts` - Create a new post 
  - Required fields: title, content
  
- `PUT /api/posts/{id}` - Update a post 
  - Required fields: title, content
  
- `DELETE /api/posts/{id}` - Delete a post (requires authentication and ownership)

## postman collection
- You can find the Postman collection for testing the API in the root of this repository.
