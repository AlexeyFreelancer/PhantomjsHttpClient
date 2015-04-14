<?php

require "vendor/autoload.php";

use PhantomjsHttpClient\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$client->setHeaders(array(
    'key1' => 'val1',
    'key2' => "val2"
));

$client->addHeader('key3', 'val3');

$params = array(
    'param1' => 'val1',
    'param2' => 'val2',
);

/* @var Crawler $crawler */
$crawler = $client->request('POST', 'http://chinaprices.ru/dev/test_request.php', $params);

/* @var \Symfony\Component\BrowserKit\Response $response */
$response = $client->getResponse();

var_dump($response->getStatus(), $response->getHeaders(), (string) $response->getContent());



