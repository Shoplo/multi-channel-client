# Shoplo Multi Client

This php client enables php developers to communicate with Shoplo Multi with an oauth 2 authentication.

## Requirements

* guzzle
* doctrine annotations

## Features

* Compatible with PHP 5.5 or greater.
* Easy to install with Composer

## Installation

The SDK can be installed with [Composer](getcomposer.org).

1. Install Composer.
```
curl -sS https://getcomposer.org/installer | php
```
2. Install the SDK.
```
php composer.phar require shoplo/shoplo-multi-client
```
3. Add doctrine annotations to autoload file or front controller.
```
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
```
4. Require Composer's autoloader by adding the following line to your code.
```
require 'vendor/autoload.php';
```

## Example

**Authentication using oauth 2.**

```
session_start();
require_once __DIR__ . '/autoload.php';

ini_set('display_errors','TRUE');
error_reporting(E_ALL);

define('SECRET_KEY','6kh7cej1e6o84coo0k80w0oocg080cswsk804wcc0g4k8kkoo');
define('PUBLIC_KEY', '1rauyj5gfyasw8840s4444g40cksw0og4gwo8scsgcgw04kgoc');
define('CALLBACK_URL', 'http://127.0.0.1/omnisale-client/example.php');

$accessToken = $refreshToken = null;

$config = [
    'apiBaseUrl' => 'https://api.shoplo.io',
    'publicKey' => PUBLIC_KEY,
    'secretKey' => SECRET_KEY,
    'callbackUrl' => CALLBACK_URL,
    'accessToken' => $accessToken,
    'refreshToken' => $refreshToken,
    'scope' => 'scope_read_order scope_write_order scope_read_customer scope_write_customer scope_read_product scope_write_product',
];

$guzzleConfig = [
    'base_uri' => 'https://api.shoplo.io'
];

$guzzleAdapter = new \ShoploMulti\Guzzle\GuzzleAdapter(new \GuzzleHttp\Client($guzzleConfig));
$guzzleAdapter->setAccessToken($accessToken);
$shoploMultiClient = new \ShoploMulti\ShoploMultiClient($guzzleAdapter, \JMS\Serializer\SerializerBuilder::create()->build(), $config);

$response = $shoploMultiClient->authorize();
```

**Orders resource.**

```
$orderResource = new \ShoploMulti\Resource\ShoploMultiOrderResource($shoploMultiClient);

$with = [
    'with' => [
        'order.addresses',
        'order.tags',
        'order.items',
        'order.fulfillments',
        'order.customer',
        'order.shipping_lines',
    ]
];

$orders = $orderResource->getOrders($with);
$orders = $orderResource->getCount();
$orders = $orderResource->getOrder(6, $with);

$fulfillments = new \ShoploMulti\Model\Order\ShoploMultiOrderFulfillments();
$fulfillments->tracking_company = 'Poczta Polska';
$trackingUrl = 'http://emonitoring.poczta-polska.pl/?numer=123123123123';

$fulfillments->tracking_urls = [$trackingUrl];
$fulfillments->tracking_numbers = ['123123123123'];

$response = $orderResource->createOrderFullfilments(6, $fulfillments);
```

**Products resource.**

```
$productResource = new \ShoploMulti\Resource\ShoploMultiProductResource($shoploMultiClient);

$with = [
    'with' => [
        'product.images',
        'product.tags',
        'product.variants',
        'product.variants.properties',
        'category.path',
        'category.path_siblings',
    ]
];

$response = $productResource->getProducts($with);
$response = $productResource->getCount();
```

**Customers resource.**

```
$customerResource = new \ShoploMulti\Resource\ShoploMultiCustomerResource($shoploMultiClient);

$response = $customerResource->getCustomers();
$response = $customerResource->getCount();
```
