# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Environment variable configuration with `.env` file support
- Custom `Env` class for environment variable management
- CSRF protection for all forms
- PHPUnit testing framework and initial test suite
- GitHub Actions CI/CD pipeline for automated testing
- PHP_CodeSniffer configuration for PSR-12 compliance
- PHPStan static analysis configuration
- Comprehensive README with installation and usage instructions
- SECURITY.md with security policies and best practices
- CONTRIBUTING.md with contribution guidelines
- CHANGELOG.md for tracking changes

### Changed
- Moved all credentials from `config.php` to environment variables
- Updated `Form.php` to use environment variables instead of constants
- Improved error handling in `Connection.php` and `Text.php`
- Error logging instead of printing errors to users
- Updated reCAPTCHA implementation to use environment variables
- Improved database connection with PDO attributes
- Enhanced composer.json with scripts and better dependency management

### Fixed
- SQL injection vulnerability in `Text::updateByLink()` (added content parameter binding)
- Deprecated `FILTER_SANITIZE_STRING` usage (removed in PHP 8.1+)
- Error handling bug in `Connection.php` (throw after die)
- Missing HTTP response codes for API endpoints
- Missing CSRF token field name in contact form
- Double semicolon in Form.php

### Removed
- Unused `Image.php` class
- Hardcoded SMTP credentials from `Form.php`
- Hardcoded reCAPTCHA site key from contact view
- Database credentials from `config.php`

### Security
- Added CSRF token validation for all POST requests
- Implemented secure environment variable loading
- Added proper input sanitization with null coalescing
- Improved error handling to prevent information disclosure
- Added security audit in CI/CD pipeline
- Added comprehensive security documentation

## [1.0.0] - 2020-02-13

### Added
- Initial release
- Basic portfolio template
- Router for URL routing
- Contact form with PHPMailer
- reCAPTCHA v3 integration
- Admin panel for content management
- Photo gallery page
- MySQL/MariaDB database integration
- Bootstrap responsive design

[Unreleased]: https://github.com/raspgot/template/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/raspgot/template/releases/tag/v1.0.0
