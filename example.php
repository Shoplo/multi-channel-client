<?php
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

//$response = $shoploMultiClient->authorize();
//$guzzleAdapter->setAccessToken($response['access_token']);


//ORDERS
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

//$orders = $orderResource->getOrders($with);
//$orders = $orderResource->getCount();
//$orders = $orderResource->getOrder(6, $with);
//print_r($orders);exit;

//$fulfillments = new \ShoploMulti\Model\Order\ShoploMultiOrderFulfillments();
//$fulfillments->tracking_company = 'Poczta Polska';
//$trackingUrl = 'http://emonitoring.poczta-polska.pl/?numer=123123123123';

//$fulfillments->tracking_urls = [$trackingUrl];
//$fulfillments->tracking_numbers = ['123123123123'];

//$response = $orderResource->deleteOrderFullfilments(656, 2302);
//$response = $orderResource->createOrderFullfilments(656, $fulfillments);

//var_dump($response);exit;

//ORDERS

//PRODUCTS

//$productResource = new \ShoploMulti\Resource\ShoploMultiProductResource($shoploMultiClient);

//$with = [
//    'with' => [
//        'product.images',
//        'product.tags',
//        'product.variants',
//        'product.variants.properties',
//        'category.path',
//        'category.path_siblings',
//    ]
//];

//$response = $productResource->getProducts($with);
//$response = $productResource->getProduct(334); !!! nie działa with
//$response = $productResource->getCount();
//print_r($response);exit;

//PRODUCTS

//CUSTOMERS

$customerResource = new \ShoploMulti\Resource\ShoploMultiCustomerResource($shoploMultiClient);

$response = $customerResource->getCustomers();
//$response = $customerResource->getCustomer(28);
//$response = $customerResource->getCount();
print_r($response);exit;

//CUSTOMERS