# Portfolio Template

A simple and secure PHP portfolio template with dynamic content management, contact form, and photo gallery.

## Features

- 🔒 Secure authentication and content management
- 📧 Contact form with reCAPTCHA protection
- 🎨 Bootstrap-based responsive design
- 📝 Dynamic content editing through admin panel
- 🖼️ Photo gallery support
- 🌍 Multi-page routing with custom Router class

## Requirements

- PHP 8.0 or higher
- MySQL 5.7+ or MariaDB 10.2+
- Composer
- Web server (Apache, Nginx, or PHP built-in server)

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/raspgot/template.git
cd template
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure environment

Copy the example environment file and configure your settings:

```bash
cp .env.example .env
```

Edit `.env` file with your settings:

```env
# Environment
APP_ENV=dev
APP_TIMEZONE=Europe/Paris
SITE_NAME=YourSiteName

# Database Configuration
DB_HOST=localhost
DB_NAME=cms
DB_USERNAME=root
DB_PASSWORD=your_password

# SMTP Configuration
SMTP_HOST=mail.example.com
SMTP_USERNAME=contact@example.com
SMTP_PASSWORD=your_smtp_password
SMTP_PORT=587
SMTP_SECURE=tls

# ReCaptcha Configuration
RECAPTCHA_SECRET_KEY=your_recaptcha_secret_key
RECAPTCHA_SITE_KEY=your_recaptcha_site_key

# Email Settings
MAIL_FROM_ADDRESS=contact@example.com
MAIL_FROM_NAME=YourName
```

### 4. Set up the database

Create a MySQL database and import the schema:

```bash
mysql -u root -p
```

```sql
CREATE DATABASE cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
exit;
```

Import the database structure:

```bash
mysql -u root -p cms < contents.sql
```

### 5. Run the application

#### Development server (PHP built-in):

```bash
php -S localhost:8010 -t public
```

Access the application at: `http://localhost:8010`

#### Production server:

Configure your web server to point to the `public` directory.

**Apache example** (`.htaccess`):
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

**Nginx example**:
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## Usage

### Admin Panel

Access the admin panel at `/admin` to manage your content.

### Contact Form

The contact form is protected with Google reCAPTCHA v3. Make sure to:
1. [Create a reCAPTCHA site key](https://www.google.com/recaptcha/admin)
2. Add your keys to the `.env` file

### Adding Pages

To add a new page, edit `public/index.php`:

```php
Router::add('/your-page', function() {
    $res = Text::getByLink('/your-page');
    require VIEWS_PATH . 'pages/your-page.php';
});
```

Then create the view file in `views/pages/your-page.php`.

## Security

- **Never commit your `.env` file** - it contains sensitive credentials
- Keep your dependencies updated with `composer update`
- Use strong database and SMTP passwords
- Enable HTTPS in production
- Regularly review and update reCAPTCHA keys

## Project Structure

```
.
├── public/              # Web root directory
│   ├── index.php       # Application entry point
│   └── assets/         # CSS, JS, images
├── src/                # PHP classes
│   ├── Connection.php  # Database connection handler
│   ├── Env.php        # Environment variable loader
│   ├── Form.php       # Contact form handler
│   ├── Router.php     # URL routing
│   └── Text.php       # Content management
├── views/              # View templates
│   ├── layout.php     # Main layout
│   └── pages/         # Page templates
├── .env.example       # Environment configuration template
├── composer.json      # PHP dependencies
├── config.php         # Application configuration
└── contents.sql       # Database schema
```

## Development

### Error Handling

In development mode (`APP_ENV=dev`), detailed error messages are displayed using Whoops.

In production mode (`APP_ENV=prd`), errors are logged and generic messages are shown to users.

### Debugging

The application shows page load time in the footer when in development mode.

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open source and available under the [MIT License](LICENSE).

## Author

Gauthier Witkowski - [contact@raspgot.fr](mailto:contact@raspgot.fr)

## Support

For issues and questions, please [open an issue](https://github.com/raspgot/template/issues) on GitHub.