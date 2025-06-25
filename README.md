# Portfolio CMS Backend

A Laravel-based Content Management System (CMS) backend for managing content of the "CMS" repository. This repository serves as the admin panel for the "Dopefolio dynamic  website".

## Overview

This backend application provides:
- Content management interface for "Dopefolio dynamic  website"
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

## Related Repository

- **Frontend**: [Dopefolio Dynamic Site](https://github.com/dimis283/cms) - The main website that consumes this CMS

## Installation

 Clone the repository:
   ```bash
   git clone https://github.com/yourusername/demo.git

I uploaded the sqlite with the tables, check if works.



## Usage

### Admin Dashboard
Access the CMS admin panel at: `http://localhost:8000/

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
- **Breeze** - authentication scaffolding package
