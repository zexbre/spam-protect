# ZexBre\SpamProtect

A simple, driver based spam protection package.

Check for spam messages on client requests before forwarding them to the system
for further processing.

## Installation

Install the latest version with

```bash
$ composer require zexbre/spam-protect
```

## Basic Usage

### Client side

```html

<?php use ZexBre\SpamProtect\Factory\ReCaptchaVersion2Factory; ?>

<html>
    <head>
        <?php
        // ...
        $widgetData = ReCaptchaVersion2Factory::getWidgetResponse([
            'reCaptchaSiteKey' => [RECAPTCHA-SITE-KEY],
            'hl' => [LANGUAGE-CODE], // optional
        ]);
        echo $widgetData->htmlHead;
        ?>
    </head>

    <body>
        <?php
        // ...
        echo $widgetData->htmlBody;
        ?>
    </body>
<html>
```

### Server side

```php
<?php

use ZexBre\SpamProtect\Factory\ReCaptchaVersion2Factory;

// (1/3) preparation
$spamProtect = ReCaptchaVersion2Factory::getProtector([
    'reCaptchaSecretKey' => [RECAPTCHA-SECRET-KEY],
    'gReCaptchaResponse' => [RECAPTCHA-RESPONSE],
    'acceptLanguage' => [ACCEPT-LANGUAGE-HEADER], // optional
    'httpReferer' => [HTTP-REFERER-HEADER], // optional, see '$_SERVER["HTTP_REFERER"]'
    'httpUserAgent' => [HTTP-USER-AGENT-HEADER], // optional, see '$_SERVER["HTTP_USER_AGENT"]'
]);

// (2/3) verification
$spamProtect->verify();

// (3/3) validation
$isHuman = $spamProtect->isHuman(); // boolean
$isRobot = $spamProtect->isRobot(); // boolean
$isValidResponse = $spamProtect->isValidResponse(); // boolean
$isInvalidResponse = $spamProtect->isInvalidResponse(); // boolean
$errors = $spamProtect->getErrors(); // array
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed
recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and
[CODE OF CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email to niks986@gmail.com
instead of using the issue tracker.

## Credits

- [Nikola Zeravcic][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more
information.

[link-author]: https://github.com/zeravcic
[link-contributors]: ../../contributors
