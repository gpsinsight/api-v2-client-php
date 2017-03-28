# GPS Insight API Client Library for PHP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]

This is the official PHP client library for interacting with the **GPS Insight API (V2)**.

[![GPS Insight logo](http://www.gpsinsight.com/apidocs/images/gpsi_logo_flat.png)][gps-insight]

[GPS Insight][gps-insight] provides vehicle fleet GPS tracking and FMCSA-compliant electronic logging devices (ELD)
for regulating hours of service (HOS). GPS Insight's API (V2) provides a programmatic way to push your fleet's data
from our system to your back-end systems (e.g., ERP, Dispatch, CRM). By using our API you can effortlessly integrate
your fleet's data into your back-end systems to provide transparency into payroll, fuel card transactions, additional
documentation, asset management, and more.

The [GPS Insight API documentation][gps-apidocs] is hosted on our website. Be sure to sign up
for an account and follow the directions to get API credentials before using this library.

## Installation

This package is hosted on [Packagist][link-packagist] and is installable via [Composer][link-composer].

### Requirements

- PHP version 5.5 or greater
- Composer (for installation)
- [Guzzle][guzzle-docs] is installed automatically as a dependency and requires one of the following to
  make HTTP requests:
    - A recent version of cURL (minimum 7.19.4) compiled with OpenSSL and zlib.
    - Enable `allow_url_fopen` in your system's `php.ini`.

### Installing Via Composer

Run the following command (assuming `composer` is available in your PATH):

```bash
$ composer require gpsinsight/api-v2-client
```

This will set the **GPS Insight API Client Library** as a dependency in your project and install it.

When bootstrapping your application, you will need to require `'vendor/autoload.php'` in order to setup autoloading
for the GPS Insight API Client Library and any of your other Composer-installed packages.

## Basic Usage

### Code

```php
use GpsInsight\Api\V2\GpsInsight;

// Create and configure an SDK object
$gpsInsight = new GpsInsight([
    'username'  => 'johndoe3000',
    'app_token' => '490f5ed342ca8',
]);

// Call the "create" method of the "driver" service
// Note: API authentication is applied automatically by the client library
$result = $gpsInsight->driver->create([
    'lastname' => 'Lindblom',
    'firstname' => 'Jeremy',
    'email' => 'jlindblom@example.com',
    'timezone' => 'US/Arizona',
]);

print_r($result->getData());
```

### Output
    
```
Array
(
    [id] => 4551485
    [message] => Driver added
)
```

## Additional Usage

If you are using an IDE like PhpStorm that supports intellisense, the names of services and operations will
autocomplete for you. For parameters, you should consult the official [GPS Insight API documentation][gps-apidocs].

## Concepts

### Classes

All classes are in the root namespace of `GpsInsight\Api\V2`.

- `GpsInsight` – The starting point to the library (as seen above in the example). Users can access the various
  available services via readonly, intellisense-ready properties (e.g., `$gpsInsight->driver`, `$gpsInsight->landmark`)
- `ServiceClient` – Encapsulates APIs for a particular service (e.g., `$gpsInsight->driver->create()`)
- `Client` – A `guzzlehttp/command`-powered client that is used by the `GpsInsight` and various `ServiceClient`
  classes
- `Result` – An `ArrayAccessible` object that encapsulates the parsed data from an API response. It is returned as the
  result of any API call (e.g., `$result = $gpsInsight->driver->create(); echo $result['message'];`)
- `Services` – A class containing the list of valid services names
- `Middleware` – The `Middleware` directory contains `guzzlehttp/command` middleware that are used to perform
  transformations on the command or result prior to them being serialized to a request or response. For example, auth
  is handled via a middleware, as is applying an app channel.
  
### Configuration

When instantiating the `GpsInsight` class, you must provide configuration options to setup the API client. The
following settings are allowed:

- **app_token** (`string`, _conditionally required<sup> †</sup>_) – GPS Insight API "App Token", which acts as a credential for
  a specific application
- **channel** (`string`, _recommended_) – An identifier to tag your requests with for your application. You can then
  retrieve stats about your application's API usage with the [channel APIs][gps-apidocs-channel]
- **endpoint** (`string`, _optional_) – Base URL endpoint for accessing the GPS Insight API. Defaults to the
  production GPS Insight API endpoint: "https://api.gpsinsight.com"
- **http_handler** (`callable`, _optional_) – Custom or shared Guzzle HTTP handler. See docs for `handler` in the
  [Guzzle documentation for "Creating a Client"][guzzle-docs-handler]
- **http_options** (associative `array`, _optional_) – A set of Guzzle HTTP request options. See docs for
  [Request Options in the Guzzle Documentation][guzzle-docs-requestopts]
- **password** (`string`, _conditionally required<sup> †</sup>_) – GPS Insight API account password
- **session_token** (`string`, _conditionally required<sup> †</sup>_) – GPS Insight API "session token"
- **token_cache** (`TokenCacheInterface`, _recommended_) – A token cache for storing/retrieving session tokens.
- **username** (`string`, _required_) – GPS Insight API account username
- **version** (`string`, _recommended_) – A version number to tag your requests with for your application. Use
  this with in combination with `channel`
- **wire_log** (`bool|LoggerInterface`, _optional_) – Use this to enable wire logging for debugging purposes. Set to
  `true` for the default logger that writes to `STDOUT`, or provide a PSR-3 compliant `LoggerInterface`
  
<sup>†</sup> You must provide at least one of `app_token`, `password`, or `session_token` along with your `username`
to authenticate to the GPS Insight API. For more information about API credentials, please read the
[GPS Insight API documentation][gps-apidocs].

#### Advanced Example

```php
use GpsInsight\Api\V2\GpsInsight;
use GpsInsight\Api\V2\TokenCache\CallbackCache as TokenCallbackCache;

// Create and configure an SDK object
$gpsInsight = new GpsInsight([
    'username'  => 'johndoe3000',
    'app_token' => '490f5ed342ca8',
    'channel' => 'my_custom_app',
    'version' => '2.10.1',
    'token_cache' => new TokenCallbackCache(
        function ($key) {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        },
        function ($key, $token) {
            $_SESSION[$key] = $token;
        }
    ),
]);
```
  
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email websecurity@gpsinsight.com directly instead of using the
issue tracker. This allows us to take appropriate actions to mitigate the issues as quickly as possible.

## Credits

- [Jeremy Lindblom](https://github.com/jeremeamia)
- [Jennifer Dearing](https://github.com/jdearing11)
- [Grant Anderson](https://github.com/pendenga)
- [Drew LeSueur](https://github.com/drewlesueur)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gpsinsight/api-client.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gpsinsight/gpsinsight-api-v2-php-client/master.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gpsinsight/api-client
[link-travis]: https://travis-ci.org/gpsinsight/gpsinsight-api-v2-php-client
[link-composer]: https://getcomposer.org/

[gps-insight]: http://www.gpsinsight.com/
[gps-apidocs]: http://www.gpsinsight.com/apidocs/
[gps-apidocs-channel]: http://www.gpsinsight.com/apidocs/#/service/channel

[guzzle-docs]: http://docs.guzzlephp.org/
[guzzle-docs-handler]: http://docs.guzzlephp.org/en/latest/quickstart.html#creating-a-client
[guzzle-docs-requestopts]: http://docs.guzzlephp.org/en/latest/request-options.html
