<?php
session_start();
require_once __DIR__ . '/autoload.php';

ini_set('display_errors','TRUE');
error_reporting(E_ALL);

define('SECRET_KEY','6kh7cej1e6o84coo0k80w0oocg080cswsk804wcc0g4k8kkoo');
define('PUBLIC_KEY', '1rauyj5gfyasw8840s4444g40cksw0og4gwo8scsgcgw04kgoc');
define('CALLBACK_URL', 'http://127.0.0.1/omnisale-client/example.php');


$accessToken = $refreshToken = null;
$accessToken = 'ZDg0NTQ1YzQ2NjU3MWRjZjk1NjY3NmFkMmM5MWRkMTRkYzFhNDBjNTJiZTdiYzYxMjk0Mjk1OTU0NmM3ZTU0Yg';
$refreshToken = 'OGZhZjcxMGU2YTU0ZTJlZDBiZmI3NjQwMmVjMmNkNTJjZTNmNTIxYzgzNDdkMTYwY2JmMTAzMmY4MzVmZmQyZg';

$config = [
    'apiBaseUrl' => 'https://api.shoplo.io',
    'publicKey' => PUBLIC_KEY,
    'secretKey' => SECRET_KEY,
    'callbackUrl' => CALLBACK_URL,
    'accessToken' => $accessToken,
    'refreshToken' => $refreshToken,
    'scope' => 'scope_read_order scope_write_order scope_read_customer scope_write_customer scope_read_product scope_write_product',
];

//$guzzleClient = new \Omnisale\Guzzle\GuzzleClient($config);
//$omnisaleClient = new \Omnisale\OmnisaleClient($guzzleClient);

//$response = $omnisaleClient->refreshToken($refreshToken);
//print_r($response);exit;

//$with = [
//    'product.variants',
//    'product.details'
//];
//
//$productResource = new \Omnisale\Resource\OmnisaleProductResource($omnisaleClient);
//$rsp = $productResource->getProducts(0, ['with'=>$with]);
//print_r($rsp);exit;

//$rsp = $omnisaleClient->getUser();
//print_r($rsp);exit;


//$response = $omnisaleClient->authorize();
//print_r($response);exit;

//$config['accessToken'] = $response['access_token'];
//$config['refreshToken'] = $response['refresh_token'];

$guzzleClient = new \Omnisale\Guzzle\GuzzleClient($config);
$omnisaleClient = new \Omnisale\OmnisaleClient($guzzleClient);
//$user = $omnisaleClient->getUser();
//print_r($user);exit;
$with = [
    'order.addresses',
    'order.tags',
    'order.items',
    'order.fulfillments',
    'order.customer',
    'order.shipping_lines',
//    'order.channel',
//    'order.shop_channel',
//    'order.customer_channel',
//    'order_item.product_channel',
//    'order_item.channel_variant',
];

$orderResource = new \Omnisale\Resource\OmnisaleOrderResource($omnisaleClient);
$date = '2017-03-30 00:00:00';
//echo date('c', strtotime($date));exit;
$rsp = $orderResource->getOrder(652, ['with'=>$with]);
print_r($rsp);exit;
$fulfillments = new \Omnisale\Model\Order\OmnisaleOrderFulfillments();
$fulfillments->tracking_company = 'test';
$fulfillments->tracking_data = 'test2';
$fulfillments->tracking_urls = 'http://asd.pl';
$fulfillments->tracking_numbers = '12312312';
$fulfillments->order_items_ids = [880];

$response = $orderResource->createOrderFullfilments(652, $fulfillments);
//$rsp = $orderResource->getOrders(0, ['with'=>$with, 'createdAtMin'=>date('c', strtotime($date))]);
//$rsp = $orderResource->getOrders(['with'=>$with, 'since_id'=>'652']);
//$rsp = $orderResource->getCount();

print_r($response);exit;

