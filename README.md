# Tolentino POS — CodeIgniter 4

A basic Point-of-Sale (POS) management system developed using CodeIgniter 4, PHP, MySQL, HTML, and CSS.

This project was created for **IT0049 — Web System Technologies** at FEU Institute of Technology.

## Project Overview

Tolentino POS is a database-driven web application that allows users to manage customer and staff records through a clean, responsive black-and-white interface.

The project was developed progressively through three technical formative assessments.

## Features

### TFA1 — Basic POS Website
- Home page
- About page
- Customer Accounts listing
- User Accounts listing
- Static PHP arrays for sample records

### TFA2 — Database Integration
- MySQL database connection
- CustomerModel and UserModel
- Database-driven customer and user listings
- Sample customer and user records

### TFA3 — Forms, Validation, and File Upload
- Create new customer accounts
- Create new user accounts
- Edit existing customer and user records
- Form validation with error messages
- Unique username validation
- Preservation of entered form values after validation errors
- JPG and PNG avatar uploads (maximum 2 MB)
- Automatic avatar resizing to 300 × 300 pixels
- Placeholder avatars for users without profile pictures

## Technologies Used

- CodeIgniter 4
- PHP 8.2+
- MySQL / MariaDB
- Apache (XAMPP)
- Composer
- HTML and CSS
- Git and GitHub

## Installation Instructions

1. Install XAMPP, Composer, and Git.
2. Clone this repository into `C:\xampp\htdocs`.
3. Open the project folder in VS Code.
4. Open a terminal inside the project and run:

   `composer install`

5. Start Apache and MySQL using XAMPP.
6. Open phpMyAdmin at `http://localhost/phpmyadmin`.
7. Create a database named `tolentino_pos`.
8. Import the database export from `database/tolentino_pos.sql`.
9. Copy the `env` file and rename the copy to `.env`.
10. Configure the database settings in `.env`:

```ini
database.default.hostname = localhost
database.default.database = tolentino_pos
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

11. Configure the base URL:

```ini
app.baseURL = 'http://localhost/TFA1_Tolentino-Czarli/'
```

12. Open the application in your browser:

`http://localhost/TFA1_Tolentino-Czarli/`

**Note:** The localhost URL assumes the project folder retains its original name and Apache is configured to route requests to CodeIgniter's `public` directory.

## Application Routes

| Page | Route |
|---|---|
| Home | `/` |
| About | `/about` |
| Customer Accounts | `/customers` |
| New Customer | `/customers/new` |
| Edit Customer | `/customers/{id}/edit` |
| User Accounts | `/users` |
| New User | `/users/new` |
| Edit User | `/users/{id}/edit` |

## Database

Database name: `tolentino_pos`

Tables:
- `customers`
- `users`

The SQL export is available at `database/tolentino_pos.sql`.

The users table includes an `avatar` column for storing profile image filenames.

## File Uploads

User avatars are stored in:

`public/uploads/avatars/`

Uploaded JPG and PNG files are validated, resized, and saved using generated filenames.

Only the filenames are stored in the database.

## Development Notes

- This project is intended for academic use.
- Authentication and payment processing are not implemented.
- Sample records are used for demonstration.
- Environment-specific credentials are excluded from version control.

## Deployment

A publicly hosted version will be added after deployment.

## Developer

Developed for IT0049 — Web System Technologies.

FEU Institute of Technology.
