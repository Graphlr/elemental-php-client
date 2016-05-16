# Graphlr Elemental PHP Client

## An PHP Client for Elemental Conductor by Tim Hanssen / Graphlr - Gwingo 2016

## Introduction

Neo4j-PHP-Client is the most advanced and flexible [Neo4j](http://neo4j.com) Client for PHP. 

### What is Elemental Coductor

Elemental Conductor is a video network management system for file-based and live video delivery applications. The software-based solution offers high availability, secure administration and comprehensive monitoring of video encoding and delivery tasks through an easy-to-use web-based user interface. To learn more visit [Elemental Coductor product page](http://www.elementaltechnologies.com/products/elemental-conductor)?

#### Version Support

| **Version** | **Tested**  |
|-------------|-------------|
| 2.9         |   Yes       |


### Requirements

* PHP >= 5.6
* A Elemental Conductor (minimum version 2.9)


## Installation and basic usage

### Installation

Add the library to your composer dependencies :

```bash
composer require graphlr/elemental-php-client
```

Require the composer autoloader, configure your connection by providing a connection alias and your connection settings :

```php
<?php

require_once 'vendor/autoload.php';

use Gwingo\Elementa;\Client\ClientBuilder;

$client = ClientBuilder::create()
    ->addConnection('default', 'USR', PASS )
    ->build();
```

You're now ready to connect to Elemental.

### Settings

#### Timeout

You can configure a global timeout for the connections :

```php
$client = ClientBuilder::create()
    ->addConnection('default', 'HOSNAME)
    ->setDefaultTimeout(3)
    ->build();
```

The timeout by default is up to 5 seconds.

### License

The library is released under the MIT License, refer to the LICENSE file bundled with this package.




