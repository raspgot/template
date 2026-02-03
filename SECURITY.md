# Security Policy

## Supported Versions

We release patches for security vulnerabilities for the following versions:

| Version | Supported          |
| ------- | ------------------ |
| 1.x.x   | :white_check_mark: |

## Reporting a Vulnerability

We take the security of our project seriously. If you have discovered a security vulnerability, please follow these steps:

1. **DO NOT** open a public issue on GitHub
2. Email your findings to [contact@raspgot.fr](mailto:contact@raspgot.fr)
3. Include as much information as possible:
   - Type of vulnerability
   - Steps to reproduce
   - Potential impact
   - Suggested fix (if any)

## Security Best Practices

When deploying this application, please ensure:

### Environment Configuration
- Never commit `.env` file to version control
- Use strong, unique passwords for database and SMTP
- Rotate credentials regularly
- Keep `RECAPTCHA_SECRET_KEY` and `RECAPTCHA_SITE_KEY` confidential

### Database Security
- Use a dedicated database user with minimal privileges
- Enable MySQL/MariaDB SSL connections in production
- Keep database software updated
- Use prepared statements (already implemented)

### Web Server Configuration
- Enable HTTPS in production (use Let's Encrypt)
- Configure proper file permissions (directories: 755, files: 644)
- Disable directory listing
- Keep PHP and web server software updated
- Configure appropriate `php.ini` settings:
  ```ini
  display_errors = Off
  log_errors = On
  error_log = /var/log/php/error.log
  session.cookie_httponly = 1
  session.cookie_secure = 1
  session.use_strict_mode = 1
  ```

### Application Security
- Keep Composer dependencies updated: `composer update`
- Run security audits regularly: `composer audit`
- Monitor error logs for suspicious activity
- Implement rate limiting on contact form (currently not implemented)
- Review and update CSRF tokens regularly

### CSRF Protection
- CSRF tokens expire after 1 hour
- Tokens are validated on all POST requests
- Use hash_equals() for timing-safe comparison

### Input Validation
- All user inputs are sanitized
- Email addresses are validated
- HTML special characters are escaped
- reCAPTCHA v3 protects forms from bots

## Known Security Considerations

### Currently Implemented
- ✅ Environment-based configuration
- ✅ CSRF protection on forms
- ✅ SQL injection prevention (prepared statements)
- ✅ XSS prevention (htmlspecialchars)
- ✅ Email validation and sanitization
- ✅ reCAPTCHA spam protection
- ✅ Secure password handling for SMTP
- ✅ Error logging instead of displaying
- ✅ Session security

### Future Improvements
- ⏳ Rate limiting on contact form
- ⏳ Admin panel authentication
- ⏳ Two-factor authentication for admin
- ⏳ Content Security Policy (CSP) headers
- ⏳ Security headers (X-Frame-Options, etc.)
- ⏳ IP-based access control for admin panel

## Dependency Security

We use the following security measures for dependencies:

1. Regular updates via Composer
2. Security audits with `composer audit`
3. Automated security checks in CI/CD pipeline
4. Monitoring GitHub Security Advisories

## Response Timeline

- We aim to acknowledge security reports within 48 hours
- We will provide a fix timeline within 7 days
- Critical vulnerabilities will be patched within 24-48 hours
- Non-critical vulnerabilities will be patched in the next release

## Credits

We appreciate security researchers who responsibly disclose vulnerabilities. With your permission, we will credit you in:
- Release notes
- Security advisories
- This document

Thank you for helping keep our project secure!
