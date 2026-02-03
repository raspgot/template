<?php
namespace App;

/**
 * CSRF Token Manager
 * Provides Cross-Site Request Forgery protection
 */
class Csrf
{
    private const TOKEN_NAME = 'csrf_token';
    private const TOKEN_TIME_NAME = 'csrf_token_time';
    private const TOKEN_LIFETIME = 3600; // 1 hour in seconds

    /**
     * Generate a new CSRF token
     * 
     * @return string The generated token
     */
    public static function generateToken(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $token = bin2hex(random_bytes(32));
        $_SESSION[self::TOKEN_NAME] = $token;
        $_SESSION[self::TOKEN_TIME_NAME] = time();

        return $token;
    }

    /**
     * Get the current CSRF token, generate one if it doesn't exist
     * 
     * @return string The current token
     */
    public static function getToken(): string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Generate new token if it doesn't exist or is expired
        if (!isset($_SESSION[self::TOKEN_NAME]) || self::isTokenExpired()) {
            return self::generateToken();
        }

        return $_SESSION[self::TOKEN_NAME];
    }

    /**
     * Verify a CSRF token
     * 
     * @param string $token The token to verify
     * @return bool True if valid, false otherwise
     */
    public static function verifyToken(string $token): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION[self::TOKEN_NAME])) {
            return false;
        }

        if (self::isTokenExpired()) {
            return false;
        }

        return hash_equals($_SESSION[self::TOKEN_NAME], $token);
    }

    /**
     * Check if the current token is expired
     * 
     * @return bool True if expired, false otherwise
     */
    private static function isTokenExpired(): bool
    {
        if (!isset($_SESSION[self::TOKEN_TIME_NAME])) {
            return true;
        }

        return (time() - $_SESSION[self::TOKEN_TIME_NAME]) > self::TOKEN_LIFETIME;
    }

    /**
     * Invalidate the current CSRF token
     */
    public static function invalidateToken(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION[self::TOKEN_NAME]);
        unset($_SESSION[self::TOKEN_TIME_NAME]);
    }
}
