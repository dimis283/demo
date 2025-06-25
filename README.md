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

## Database

This project uses **SQLite** as the database solution:
- Database file: `database/database.sqlite`
- Lightweight and portable
- No additional database server required
- Perfect for small to medium portfolio sites

**Note**: The SQLite database is included in this repository with all necessary tables already created.

## Related Repository

- **Frontend**: [Dopefolio Dynamic Site](https://github.com/yourusername/dopefolio-main) - The main website that consumes this CMS

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/demo.git
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

4. Configure environment (.env):
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/your/project/database/database.sqlite
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

### Admin Dashboard
Access the CMS admin panel at: `http://localhost:8000/`

## File Structure

```
demo/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── ...
├── database/
│   ├── database.sqlite
│   ├── migrations/
│   └── seeders/
├── routes/
│   ├── api.php
│   └── web.php
└── ...
```

## Technologies Used

- **Laravel** - PHP framework
- **SQLite** - Database
- **PHP** - Backend language
- **Composer** - Dependency management
- **Breeze** - Authentication scaffolding package

## Getting Started

Since the SQLite database with all tables is already included in the repository, you can start using the CMS immediately after following the installation steps. The database is ready to use and contains the necessary table structure for managing your portfolio content.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
