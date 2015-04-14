<?php


namespace PhantomjsHttpClient;

use Symfony\Component\BrowserKit\Client as BaseClient;
use Symfony\Component\BrowserKit\Response;

class Client extends BaseClient
{

    protected function doRequest($request)
    {
        $cmd = "phantomjs " . __DIR__ . "/phantomjs/basic.js";
        $response = json_decode(`$cmd`);
        return new Response($response->content, 200, array());
    }

}
