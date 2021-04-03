# Valorant API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jakejames/valorant-api-php-wrapper.svg?style=flat-square)](https://packagist.org/packages/jakejames/valorant-api-php-wrapper)
[![Build Status](https://travis-ci.com/JakeJames97/valorant-api-php-wrapper.svg?token=RZLqTCZSeqTmbxpWj5Dg&branch=master)](https://travis-ci.com/JakeJames97/valorant-api-php-wrapper)
[![Total Downloads](https://img.shields.io/packagist/dt/jakejames/valorant-api-php-wrapper.svg?style=flat-square)](https://packagist.org/packages/jakejames/valorant-api-php-wrapper)

This is a simple package for the recently released Valorant Api, it's a php wrapper that makes calling the api much easier.
The package follows psr-12 standards and has complete test coverage.

## Installation

You can install the package via composer:

```bash
composer require jakejames/valorant-api-php-wrapper
```

## Note:
I don't currently have access to the match api endpoints due to it not being available in my policy

## Usage
Instantiate the Valorant API class with your api token and your region.
If you want to call the account endpoints for your riot account details then you need to use the riot region enum rather than the valorant enum.

##### For Valorant Calls:
``` php
new ValorantApi('Your riot API Token', ValorantRegion::EUROPE());
```

##### For Riot Calls:
``` php
new ValorantApi('Your riot API Token', RiotRegion::EUROPE());
```

##### Example:
``` php
$api = new ValorantApi('Your riot API Token', ValorantRegion::EUROPE());

$api->content()->getContent();
$api->ranked()->getLeaderboardByAct('actId');
$api->match()->getRecentMatches('unrated');
$api->status()->getPlatformData();
$api->account()->getAccountByPuuid('Your Puuid');
```
The Valorant api has 5 classes available, each one has methods related to that class
- Match
- Content
- Ranked
- Status
- Account

##### Response Formatting
Responses are returned inside a data array which contains the response from riot.
##### Success
``` json
array:2 [▼
  "data" => array:15 [▶]
  "status" => 200
]
```
##### Error
``` json
array:2 [▼
  "error" => "An unexpected error occurred, please try again"
  "status" => "403"
]
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jakejames18@virginmedia.com instead of using the issue tracker.

## Credits

- [Jake James](https://github.com/jakejames)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
