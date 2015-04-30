# GogoKit - viagogo API Client Library for PHP

[![Build status](https://ci.appveyor.com/api/projects/status/ri2rbvoinudw27en/branch/master?svg=true)][appveyor]
[![NuGet version](https://badge.fury.io/nu/gogokit.svg)][badgefury]

[appveyor]: https://ci.appveyor.com/project/viagogo/gogokit-net/branch/master
[badgefury]: http://badge.fury.io/nu/gogokit

GogoKit is a lightweight, async viagogo API client library for PHP.

## Usage

```php
// All methods require authentication. To get your viagogo OAuth credentials,
// See TODO: docs url
$clientId = 'CLIENT_ID';
$clientSecret = 'CLIENT_SECRET';

$viagogo = new Viagogo\ViagogoClient($clientId, $clientSecret);
$viagogo->setToken($viagogo->getOAuthClient()->getClientAccessToken());

$event = $client->getEventClient()->getEvent(676615);
// Get a list of results that match your search query
$searchResults = $client->getEventClient()->getEvent(676615)("FC Barcelona tickets");
```

## Getting Started

GogoKit will be available on Composer.