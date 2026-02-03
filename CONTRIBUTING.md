# Contributing to Template

Thank you for your interest in contributing to this project! This document provides guidelines for contributing.

## Getting Started

1. Fork the repository
2. Clone your fork: `git clone https://github.com/your-username/template.git`
3. Create a branch: `git checkout -b feature/your-feature-name`
4. Make your changes
5. Test your changes
6. Commit your changes
7. Push to your fork
8. Open a Pull Request

## Development Setup

### Prerequisites
- PHP 8.0 or higher
- Composer
- MySQL/MariaDB
- Git

### Installation

```bash
# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Configure your .env file
# Set up database
mysql -u root -p < contents.sql

# Run development server
php -S localhost:8010 -t public
```

## Coding Standards

This project follows PSR-12 coding standards. Before submitting a PR:

```bash
# Run all checks
composer check

# Or individually:
composer lint        # Check code style
composer lint-fix    # Fix code style automatically
composer analyse     # Run static analysis
composer test        # Run tests
```

## Testing

Write tests for new features:

```bash
# Run all tests
composer test

# Run specific test
./vendor/bin/phpunit tests/Unit/YourTest.php
```

### Test Structure
- Unit tests go in `tests/Unit/`
- Follow existing test patterns
- Test both success and failure cases
- Mock external dependencies

## Pull Request Guidelines

### Before Submitting
- [ ] Code follows PSR-12 standards (`composer lint`)
- [ ] All tests pass (`composer test`)
- [ ] Static analysis passes (`composer analyse`)
- [ ] No security vulnerabilities (`composer audit`)
- [ ] Documentation updated (if needed)
- [ ] CHANGELOG updated (for significant changes)

### PR Description
Include:
- What changes were made
- Why the changes were necessary
- How to test the changes
- Screenshots (for UI changes)
- Related issues (if any)

### Commit Messages
Follow conventional commits:
- `feat: Add new feature`
- `fix: Fix bug in component`
- `docs: Update documentation`
- `style: Format code`
- `refactor: Refactor component`
- `test: Add tests`
- `chore: Update dependencies`

## Code Review Process

1. A maintainer will review your PR
2. Address any feedback
3. Once approved, your PR will be merged
4. Your contribution will be credited

## Areas for Contribution

### High Priority
- Admin panel authentication
- Rate limiting for contact form
- Security headers implementation
- Additional unit tests
- Integration tests

### Medium Priority
- Two-factor authentication
- Image upload functionality
- Content versioning
- Email templates
- Localization/i18n

### Low Priority
- UI/UX improvements
- Performance optimizations
- Additional documentation
- Code refactoring

## Questions?

- Open an issue for bugs
- Start a discussion for features
- Email [contact@raspgot.fr](mailto:contact@raspgot.fr) for security issues

## Code of Conduct

### Our Standards
- Be respectful and inclusive
- Accept constructive criticism
- Focus on what's best for the project
- Show empathy towards others

### Unacceptable Behavior
- Harassment or discrimination
- Trolling or insulting comments
- Publishing private information
- Unprofessional conduct

Thank you for contributing! 🎉
