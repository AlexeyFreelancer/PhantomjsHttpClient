<?php


namespace PhantomjsHttpClient;

use Symfony\Component\BrowserKit\Client as BaseClient;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\BrowserKit\Request;

class Client extends BaseClient
{

    /**
     * @param Request $request
     * @return Response
     */
    protected function doRequest($request)
    {
        $cmd = "phantomjs " . __DIR__ . "/phantomjs/basic.js " . $request->getUri();
        $response = json_decode(`$cmd`);
        return new Response($response->content, 200, array());
    }

}
