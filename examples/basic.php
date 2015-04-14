<?php

require "vendor/autoload.php";

use PhantomjsHttpClient\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

/* @var Crawler $crawler */
$crawler = $client->request('GET', 'http://www.google.com');

/* @var \Symfony\Component\BrowserKit\Response $response */
$response = $client->getResponse();

var_dump($response->getStatus(), $response->getHeaders(), (string) $response->getContent());



