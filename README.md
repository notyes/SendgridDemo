[![BuildStatus](https://api.travis-ci.org/sendgrid/smtpapi-php.png?branch=master)](https://travis-ci.org/sendgrid/smtpapi-php)
[![Latest Stable Version](https://poser.pugx.org/sendgrid/smtpapi/version.png)](https://packagist.org/packages/sendgrid/smtpapi)

**This module helps build SendGrid's SMTP API headers.**

Learn more about the SMTP API at [SendGrid's documentation](https://sendgrid.com/docs/API_Reference/SMTP_API/index.html).

# Announcements

All updates to this module is documented in our [CHANGELOG](https://github.com/sendgrid/smtpapi-php/blob/master/CHANGELOG.md).

# Installation

The following recommended installation requires [http://getcomposer.org](composer).

Add the following to your `composer.json` file.

```json
{
    "name": "sendgrid/smtpapi",
    "description": "Build SendGrid X-SMTPAPI headers in PHP.",
    "version": "0.5.0",
    "homepage": "http://github.com/sendgrid/smtpapi-php",
    "license": "MIT",
    "keywords": ["SendGrid", "sendgrid", "email", "send", "grid", "smtpapi", "smtp", "api", "xsmtp", "X-SMTP"],
    "require": {
        "php": ">=5.3",
        "swiftmailer/swiftmailer": "^5.4",
        "sendgrid/sendgrid": "^5.0",
        "vlucas/phpdotenv": "^2.3"
    },
    "require-dev": {
        "phpunit/phpunit": "3.7.*"
    },
    "replace": {
        "sendgrid/smtpapi-php": "*"
    },
    "type": "library",
    "autoload": {
        "psr-0": {"Smtpapi": "lib/"}
    }
}

```

```bash
composer install
```


Then at the top of your script require the autoloader:

```bash
require 'vendor/autoload.php';
```

For Demo in folder examples/index.php




![SendGrid Logo]
(https://uiux.s3.amazonaws.com/2016-logos/email-logo%402x.png)
