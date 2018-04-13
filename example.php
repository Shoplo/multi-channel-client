<?php
session_start();
require_once __DIR__.'/autoload.php';

ini_set('display_errors', 'TRUE');
error_reporting(E_ALL);

define('SECRET_KEY', 'XXXX');
define('PUBLIC_KEY', 'XXXX');

define('CALLBACK_URL', 'http://127.0.0.1/multi-channel-client/example.php');

$authUrl   = 'http://auth.shoplo.io';
$ssoConfig = [
    'apiBaseUrl'  => $authUrl,
    'publicKey'   => PUBLIC_KEY,
    'secretKey'   => SECRET_KEY,
    'callbackUrl' => CALLBACK_URL,
];

$apiUrl = 'http://api.shoplo.io';

$guzzleAdapter     = new \ShoploMulti\Guzzle\GuzzleAdapter(
    new \GuzzleHttp\Client(['base_uri' => $apiUrl])
);
$shoploMultiClient = new \ShoploMulti\ShoploMultiClient(
    $guzzleAdapter,
    \JMS\Serializer\SerializerBuilder::create()->build(),
    $apiUrl
);

$shoploMultiClient->initSSOAuthClient($ssoConfig);
$shoploMultiClient->authorize();

$user = $shoploMultiClient->getUser();
print_r($user);
exit;

//ORDERS
//$orderResource = new \ShoploMulti\Resource\ShoploMultiOrderResource(
//    $shoploMultiClient
//);
//
//$with = [
//    'with' => [
//        'order.addresses',
//        'order.tags',
//        'order.items',
//        'order.fulfillments',
//        'order.customer',
//        'order.shipping_lines',
//    ],
//];

//$orders = $orderResource->getOrders($with);
//$orders = $orderResource->getCount();

//$orders = $orderResource->getOrder(1, $with);
//print_r($orders);
//exit;
//
//
//$fulfillments = new \ShoploMulti\Model\Order\ShoploMultiOrderFulfillments();
//$fulfillments->tracking_company = 'Poczta Polska';
//$trackingUrl = 'http://emonitoring.poczta-polska.pl/?numer=123123123123';
//
//$fulfillments->tracking_urls = [$trackingUrl];
//$fulfillments->tracking_numbers = ['123123123123'];
//$fulfillments->status = "fulfilled";
//$response = $orderResource->deleteOrderFullfilments(1, 1);
//$response = $orderResource->createOrderFullfilments(1, $fulfillments);
//
//print_r($response);exit;

//ORDERS

//PRODUCTS

//$productResource = new \ShoploMulti\Resource\ShoploMultiProductResource($shoploMultiClient);
//
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

//$customerResource = new \ShoploMulti\Resource\ShoploMultiCustomerResource(
//    $shoploMultiClient
//);
//
//$response = $customerResource->getCustomers();
//$response = $customerResource->getCustomer(28);
//$response = $customerResource->getCount();
//print_r($response);
//exit;

//CUSTOMERS