<?php
    use App\Env;

    // Start session for CSRF protection
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Load environment variables
    $envFile = __DIR__ . '/.env';
    if (file_exists($envFile)) {
        Env::load($envFile);
    }

    // Set timezone
    date_default_timezone_set(Env::get('APP_TIMEZONE', 'Europe/Paris'));
    
    // Application constants
    define("SITE_NAME", Env::get('SITE_NAME', 'Peintre'));
    define("VIEWS_PATH", "../views/");
    define("REQUEST_URI", $_SERVER['REQUEST_URI']);
    define("DEBUG_TIME", microtime(true));
    
    // Database configuration
    define("DB_DSN", sprintf(
        "mysql:host=%s;dbname=%s;charset=utf8mb4",
        Env::get('DB_HOST', 'localhost'),
        Env::get('DB_NAME', 'cms')
    ));
    define("DB_USERNAME", Env::get('DB_USERNAME', 'root'));
    define("DB_PASSWORD", Env::get('DB_PASSWORD', ''));
    
    // Environment
    define("ENV", Env::get('APP_ENV', 'dev'));
    
    // SMTP Configuration (for backward compatibility)
    define("SMTP_HOST", Env::get('SMTP_HOST', ''));
    define("SMTP_USERNAME", Env::get('SMTP_USERNAME', ''));
    define("SMTP_PASSWORD", Env::get('SMTP_PASSWORD', ''));
    define("SMTP_PORT", Env::get('SMTP_PORT', 587));
    define("SMTP_SECURE", Env::get('SMTP_SECURE', 'tls'));
    
    // ReCaptcha Configuration
    define("RECAPTCHA_SECRET_KEY", Env::get('RECAPTCHA_SECRET_KEY', ''));
    define("RECAPTCHA_SITE_KEY", Env::get('RECAPTCHA_SITE_KEY', ''));
    
    // Email settings
    define("MAIL_FROM_ADDRESS", Env::get('MAIL_FROM_ADDRESS', 'contact@example.com'));
    define("MAIL_FROM_NAME", Env::get('MAIL_FROM_NAME', 'Raspgot'));
    define("MAIL_SUBJECT", Env::get('MAIL_SUBJECT', 'New message !'));
?>