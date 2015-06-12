# GogoKit - viagogo API Client Library for PHP
[![Code Climate](https://codeclimate.com/github/viagogo/gogokit.php/badges/gpa.svg)][codeclimate]

[codeclimate]: https://codeclimate.com/github/viagogo/gogokit.php

GogoKit is a lightweight, viagogo API client library for PHP.

## Usage

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

## Getting Started

GogoKit will be available on Composer.