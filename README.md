# ProfileApp

A custom PHP MVC portfolio application with user authentication, project management, and contact features.

## Table of Contents

- [Quick Start](#quick-start)
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Development](#development)
- [Troubleshooting](#troubleshooting)
- [Security Notes](#security-notes)

## Quick Start

Get up and running in 3 steps:

```bash
# 1. Set up the database (see Database Setup below)
mysql -u root -p < database/schema.sql

# 2. Start the PHP server
cd profileapp
php -S localhost:8000

# 3. Open your browser
# Visit: http://localhost:8000
```

## Features

- ✅ **User Authentication** - Secure registration and login with bcrypt password hashing
- ✅ **Session Management** - Automatic session handling for logged-in users
- ✅ **Portfolio Management** - Create, read, and manage project portfolios
- ✅ **Contact Form** - User contact functionality
- ✅ **Responsive Design** - Clean, modern interface
- ✅ **Custom MVC Architecture** - No external frameworks, lightweight and fast

## Prerequisites

Before you begin, ensure you have the following installed:

- **PHP 7.0+** (PHP 7.4+ or 8.x recommended)
- **MySQL 5.7+** or **MariaDB 10.2+**
- **PHP Extensions**:
  - PDO
  - pdo_mysql
- **Web Server** (optional for production):
  - Apache with mod_rewrite, OR
  - Nginx with PHP-FPM

## Installation

### Step 1: Clone the Repository

```bash
git clone <your-repository-url>
cd profileapp
```

### Step 2: Database Setup

#### Create the Database

Log into MySQL:

```bash
mysql -u root -p
```

Execute the following SQL commands:

```sql
CREATE DATABASE profileapp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE profileapp;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE projecten (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    beschrijving TEXT,
    category VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

Exit MySQL:

```sql
EXIT;
```

### Step 3: Configuration

The database credentials are located in `/app/core/Model.php` (lines 8-11).

**Default credentials:**
```php
private $host = "localhost";
private $user = "root";
private $password = "root";
private $dbname = "profileapp";
```

**To change them**, edit `/app/core/Model.php` and update the values to match your MySQL configuration.

### Step 4: Start the Application

Choose one of the following options:

#### Option A: PHP Built-in Server (Development - Recommended for Quick Start)

```bash
cd profileapp
php -S localhost:8000
```

Access the application at: **http://localhost:8000**

#### Option B: Apache (Production)

1. **Set your document root** to the `profileapp` directory (not `public`)

2. **Enable mod_rewrite**:
   ```bash
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```

3. **Configure VirtualHost** (example):
   ```apache
   <VirtualHost *:80>
       ServerName profileapp.local
       DocumentRoot /var/www/profileapp

       <Directory /var/www/profileapp>
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

4. Restart Apache:
   ```bash
   sudo systemctl restart apache2
   ```

#### Option C: Nginx (Production)

1. **Configure Nginx** (example):
   ```nginx
   server {
       listen 80;
       server_name profileapp.local;
       root /var/www/profileapp;
       index index.php;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           include fastcgi_params;
       }
   }
   ```

2. Restart Nginx:
   ```bash
   sudo systemctl restart nginx
   ```

## Configuration

### Database Connection

**File**: `/app/core/Model.php` (lines 8-11)

The database connection is configured with hardcoded values. To change the database credentials:

1. Open `/app/core/Model.php`
2. Modify lines 8-11:
   ```php
   private $host = "your_host";
   private $user = "your_username";
   private $password = "your_password";
   private $dbname = "your_database";
   ```

### Session Management

Sessions are automatically started by the helper file at `/app/helpers/helper.php` (lines 3-5).

No additional configuration is required.

## Usage

### Accessing the Application

Once the server is running, you can access:

- **Home Page**: http://localhost:8000/
- **About Page**: http://localhost:8000/about
- **Contact Page**: http://localhost:8000/contact
- **Portfolio Page**: http://localhost:8000/portfolio
- **Login Page**: http://localhost:8000/login
- **Register Page**: http://localhost:8000/register

### User Registration

1. Navigate to http://localhost:8000/register
2. Fill in your details:
   - First Name
   - Last Name
   - Email (must be valid format)
   - Password
3. Click "Register"
4. You'll be redirected to the login page

### User Login

1. Navigate to http://localhost:8000/login
2. Enter your email and password
3. Click "Login"
4. You'll be redirected to the home page with an active session

### Managing Projects

1. Log in to your account
2. Navigate to http://localhost:8000/portfolio
3. Add new projects with:
   - Title
   - Description (beschrijving)
   - Category
4. Your projects will be displayed on the portfolio page

### Logout

Click the logout link in the navigation (URL: `/app/controllers/UserController.php?q=logout`)

## Project Structure

```
profileapp/
├── app/
│   ├── controllers/        # Request handlers
│   │   ├── PageController.php      # Serves view pages
│   │   ├── UserController.php      # Handles authentication
│   │   ├── PortfolioController.php # Manages projects
│   │   └── ContactController.php   # Contact form handler
│   ├── models/             # Data models
│   │   ├── User.php        # User database operations
│   │   └── Project.php     # Project database operations
│   ├── views/              # HTML templates
│   │   ├── layout/         # Header and footer templates
│   │   ├── home.php        # Home page
│   │   ├── about.php       # About page
│   │   ├── contact.php     # Contact page
│   │   ├── portfolio.php   # Portfolio page
│   │   ├── login.php       # Login page
│   │   └── register.php    # Registration page
│   ├── core/               # MVC core classes
│   │   ├── Router.php      # URL routing
│   │   └── Model.php       # Database abstraction layer
│   └── helpers/            # Utility functions
│       └── helper.php      # Session and redirect helpers
├── public/                 # Static assets
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript files
│   ├── images/             # Images
│   └── .htaccess           # Apache rewrite rules (not used with PHP server)
└── index.php               # Application entry point

```

## Development

### MVC Architecture

The application follows a custom MVC (Model-View-Controller) pattern:

- **Models** (`/app/models/`): Handle database operations using PDO
- **Views** (`/app/views/`): Contain HTML templates
- **Controllers** (`/app/controllers/`): Process requests and handle business logic

### Adding a New Route

1. Open `/index.php`
2. Add a new route:
   ```php
   $router->add('/your-route', 'YourController@yourMethod');
   ```

### Creating a New Controller

1. Create a new file in `/app/controllers/`
2. Follow the namespace convention:
   ```php
   <?php
   namespace controllers;

   class YourController {
       public function yourMethod() {
           // Your logic here
       }
   }
   ```

### Creating a New Model

1. Create a new file in `/app/models/`
2. Extend the base Model class:
   ```php
   <?php
   namespace models;
   use core\Model;

   require_once '../core/Model.php';

   class YourModel {
       private $db;

       public function __construct() {
           $this->db = new Model();
       }
   }
   ```

### Helper Functions

Available helper functions (from `/app/helpers/helper.php`):

- **`alert($name, $message, $class)`**: Flash message system using sessions
- **`redirect($location)`**: Redirect to another page

## Troubleshooting

### Database Connection Failed

**Error**: "Database connection failed"

**Solutions**:
1. Verify MySQL is running:
   ```bash
   sudo systemctl status mysql
   # or
   sudo systemctl status mariadb
   ```

2. Test MySQL connection:
   ```bash
   mysql -u root -p
   ```

3. Check credentials in `/app/core/Model.php` (lines 8-11)

4. Verify the `profileapp` database exists:
   ```sql
   SHOW DATABASES;
   ```

5. Check that PDO extension is installed:
   ```bash
   php -m | grep PDO
   ```

### 404 - Page Not Found

**Error**: All pages show "404 - Pagina niet gevonden"

**Solutions**:
1. Verify you're accessing the correct URL (e.g., http://localhost:8000/)
2. Check that routes are defined in `/index.php`
3. Make sure the PageController exists at `/app/controllers/PageController.php`
4. Check server logs for PHP errors

### Sessions Not Working

**Error**: User remains logged out after login

**Solutions**:
1. Check PHP session directory permissions:
   ```bash
   php -i | grep session.save_path
   ls -la /path/to/session/directory
   ```

2. Verify session.save_path is writable:
   ```bash
   sudo chmod 1777 /var/lib/php/sessions
   ```

3. Check PHP error logs:
   ```bash
   tail -f /var/log/php_errors.log
   ```

### Blank White Page

**Error**: Page loads but shows nothing

**Solutions**:
1. Enable error display temporarily:
   ```php
   // Add to top of index.php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   ```

2. Check PHP error logs

3. Verify all required files exist

4. Check file permissions:
   ```bash
   chmod -R 755 profileapp
   ```

### Password Hashing Errors

**Error**: "Call to undefined function password_hash()"

**Solutions**:
- Upgrade to PHP 5.5 or higher
- Check PHP version:
  ```bash
  php -v
  ```

## Security Notes

⚠️ **Important**: This application is designed for development and learning purposes.

### Before Deploying to Production

1. **Environment Variables**: Move database credentials to environment variables instead of hardcoding them:
   ```php
   private $host = getenv('DB_HOST');
   private $user = getenv('DB_USER');
   private $password = getenv('DB_PASSWORD');
   private $dbname = getenv('DB_NAME');
   ```

2. **HTTPS**: Always use HTTPS in production

3. **Directory Security**: Ensure `/app/` is not directly accessible via web

4. **Error Display**: Disable error display in production:
   ```php
   ini_set('display_errors', 0);
   ```

5. **Input Validation**: The application uses `FILTER_SANITIZE_SPECIAL_CHARS`, but consider additional validation for production

6. **SQL Injection**: The application uses prepared statements (secure)

7. **Password Security**: Passwords are hashed with bcrypt (secure)

8. **Session Security**: Consider adding:
   ```php
   session_set_cookie_params(['secure' => true, 'httponly' => true, 'samesite' => 'Strict']);
   ```

---

## License

This project is open-source and available for educational purposes.

## Support

For issues or questions, please check the Troubleshooting section above or review the code comments for additional guidance.
