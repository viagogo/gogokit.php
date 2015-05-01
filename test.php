<?php

require 'vendor/autoload.php';

use Viagogo\ViagogoClient;

$client = new Viagogo\ViagogoClient('atE6gCHFmBicKQSy3JLq', 'kECcQ3Sz68q40fobgDRrjZ7lBniVMIJNAwTGtxyuOUWmYevLsXdhHa5K291F');
$client->setToken($client->getOAuthClient()->getClientAccessToken('internal'));

$params = new Viagogo\Common\ViagogoRequestParams();
$params->only_with_tickets = 'true';

// $eventPage = $client->getEventClient()->getEventsByCategoryId(4402, $params);

// var_dump($eventPage->getItems()[0]);

$events = $client->getListingclient()->getAllListingsByEvent(676615);

var_dump($events);