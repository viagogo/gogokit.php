# GogoKit - viagogo API Client Library for PHP
[![Package Version](https://img.shields.io/packagist/v/viagogo/gogokit.svg?style=flat)][version]
[![Total Downloads](https://img.shields.io/packagist/dt/viagogo/gogokit.svg?style=flat)][downloads]
[![Code Climate](https://img.shields.io/codeclimate/github/viagogo/gogokit.php.svg?style=flat)][codeclimate]

[version]: https://packagist.org/packages/viagogo/gogokit
[downloads]: https://packagist.org/packages/viagogo/gogokit
[codeclimate]: https://codeclimate.com/github/viagogo/gogokit.php
[apidocs]: http://developer.viagogo.net

GogoKit is a lightweight, viagogo API client library for PHP. Our
[developer site][apidocs] documents all of the viagogo APIs.


## Installation

[composer]: https://getcomposer.org

Install via [Composer][composer].

```
$ composer require 'viagogo/gogokit'
```


## Usage

[apidocsgettingstarted]: http://developer.viagogo.net/#getting-started

See our [developer site][apidocsgettingstarted] for more examples.

```php
// All methods require authentication. To get your viagogo OAuth credentials,
// See TODO: docs url
$clientId = 'CLIENT_ID';
$clientSecret = 'CLIENT_SECRET';

$viagogo = new Viagogo\ViagogoClient($clientId, $clientSecret);
$viagogo->setToken($viagogo->getOAuthClient()->getClientAccessToken());

// Get an event by id
$event = $client->getEventClient()->getEvent(676615);

// Get a list of results that match your search query
$searchResults = $client->getSearchClient()->getSearch("FC Barcelona tickets");
```


## Supported Platforms

* PHP 5.5 or higher


## How to contribute

All submissions are welcome. Fork the repository, read the rest of this README
file and make some changes. Once you're done with your changes send a pull
request. Thanks!


## Need Help? Found a bug?

[submitanissue]: https://github.com/viagogo/gogokit.rb/issues

Just [submit a issue][submitanissue] if you need any help. And, of course, feel
free to submit pull requests with bug fixes or changes.