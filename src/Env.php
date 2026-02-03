<?php
namespace App;

/**
 * Simple environment variable loader
 */
class Env
{
    private static $loaded = false;
    private static $vars = [];

    /**
     * Load environment variables from .env file
     * 
     * @param string $path Path to .env file
     */
    public static function load(string $path): void
    {
        if (self::$loaded) {
            return;
        }

        if (!file_exists($path)) {
            throw new \RuntimeException("Environment file not found: {$path}");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            
            // Skip comments
            if (strpos($line, '#') === 0) {
                continue;
            }

            // Parse key=value
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remove quotes
                $value = trim($value, '"\'');
                
                self::$vars[$key] = $value;
                
                // Also set in $_ENV and putenv
                $_ENV[$key] = $value;
                putenv("{$key}={$value}");
            }
        }

        self::$loaded = true;
    }

    /**
     * Get environment variable
     * 
     * @param string $key Variable name
     * @param mixed $default Default value if not found
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        // Check in order: self::$vars, $_ENV, getenv()
        if (isset(self::$vars[$key])) {
            return self::$vars[$key];
        }
        
        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }
        
        $value = getenv($key);
        if ($value !== false) {
            return $value;
        }
        
        return $default;
    }

    /**
     * Check if environment variable exists
     * 
     * @param string $key Variable name
     * @return bool
     */
    public static function has(string $key): bool
    {
        return isset(self::$vars[$key]) || isset($_ENV[$key]) || getenv($key) !== false;
    }
}
