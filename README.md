# Portfolio CMS Backend

A Laravel-based Content Management System (CMS) backend for managing content of the "CMS" repository. This repository serves as the admin panel for the "Dopefolio dynamic website".

## Overview

This backend application provides:
- Content management interface for "Dopefolio dynamic website"
- SQLite database for data storage
- Admin dashboard for content editing

## Features

- **SQLite Database**: Lightweight, file-based database storage
- **Admin Interface**: User-friendly CMS dashboard
- **Database Factories**: Automated test data generation
- **Database Seeders**: Sample data population

## Database

This project uses **SQLite** as the database solution:
- Database file: `database/database.sqlite`
- Lightweight and portable
- No additional database server required
- Perfect for small to medium portfolio sites

**Note**: The models and controllers are included in this repository. You'll need to create the SQLite database and run migrations to set up the tables.

## Related Repository

- **Frontend**: [Dopefolio Dynamic Site](https://github.com/dimis283/cms) - The main website that consumes this CMS

## Installation

###  Creating the Database (Required)

1. Clone the repository:
   ```bash
   git clone https://github.com/dimis283/demo.git
   cd demo
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy environment file:
   ```bash
   cp .env.example .env
   ```

4. Create SQLite database:
   ```bash
   touch database/database.sqlite
   ```

5. Configure environment (.env):
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/your/project/database/database.sqlite
   ```

6. Generate application key:
   ```bash
   php artisan key:generate
   ```

7. Run migrations to create database tables:
   ```bash
   php artisan migrate
   ```

8.  Run seeders to populate with sample data:
   ```bash
   php artisan db:seed
   ```

9. Start the development server:
   ```bash
   php artisan serve
   ```



## Technologies Used

- **Laravel** - PHP framework
- **SQLite** - Database
- **PHP** - Backend language
- **Composer** - Dependency management
- **Breeze** - Authentication scaffolding package
- **Database Factories** - Model instance generation
- **Database Seeders** - Sample data population


## Getting Started

###  Setup Required
Since the database is not included in the repository, you need to create it first using as mentioned in the installation section. The models and controllers are ready, and the migrations will create all necessary tables.


## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
