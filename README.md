# Gemora

A PHP and MySQL e-commerce web application with a customer storefront and an admin panel.

## Table of Contents

- [About](#about)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Troubleshooting](#troubleshooting)
- [License](#license)

## About

Gemora is a web-based e-commerce application for browsing and purchasing jewelry products. It includes a customer-facing storefront and a separate admin panel for managing products, users, and orders.

## Features

- Product browsing by category
- Product search
- Product detail pages
- User registration and authentication
- Shopping cart (add, update, remove items)
- Checkout flow
- Order history
- Admin dashboard for managing products, users, and orders
- Responsive design for desktop, tablet, and mobile

## Tech Stack

| Layer      | Technology              |
|------------|--------------------------|
| Backend    | PHP (PDO)                |
| Database   | MySQL / MariaDB          |
| Frontend   | HTML, CSS, Bootstrap 5, JavaScript |
| Local server | Apache (via XAMPP)     |

## Prerequisites

- [XAMPP](https://www.apachefriends.org/) (or any stack providing PHP 7.4+, Apache, and MySQL/MariaDB)
- A modern web browser
- Git (optional, for cloning)

## Installation

1. Clone the repository into your server's document root:

   ```bash
   git clone https://github.com/Yehtetag11/Gemora.git
   ```

2. Start Apache and MySQL from the XAMPP Control Panel.

3. Create a MySQL database named `gemora` (e.g. via phpMyAdmin at `http://localhost/phpmyadmin`).

4. Run the table creation script by navigating to:

   ```
   http://localhost/Gemora/Admin/database/createtable.php
   ```

5. Run the seed script to populate initial data:

   ```
   http://localhost/Gemora/Admin/database/insert_data.php
   ```

## Configuration

Database connection settings are defined in `Admin/database/data_connection.php`:

```php
$host = "localhost";
$dbname = "gemora";
$user = "root";
$password = "";
```

Update these values to match your local database credentials if they differ from the defaults.

## Usage

- Customer storefront: `http://localhost/Gemora/Customer/home.php`
- Admin panel: `http://localhost/Gemora/Admin/dashboard.php`

## Project Structure

```
Gemora/
├── Admin/
│   └── database/
├── Customer/
├── Assets/
└── README.md
```

- `Admin/` — Admin panel pages and database scripts (connection, schema, seed data, shared query functions)
- `Customer/` — Customer-facing pages
- `Assets/` — Stylesheets, images, fonts, and uploaded files

## Troubleshooting

| Issue | Likely Cause | Fix |
|---|---|---|
| `Unknown database 'gemora'` | Database not created | Create a database named `gemora` in phpMyAdmin |
| Site unreachable / connection timed out | Apache not running | Start Apache in the XAMPP Control Panel |
| Empty product listings | No products in database | Add products via the admin panel |

## License

This project is provided as-is for educational purposes.
