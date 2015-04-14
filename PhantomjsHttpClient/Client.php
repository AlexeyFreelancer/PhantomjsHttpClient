<?php


namespace PhantomjsHttpClient;

use Symfony\Component\BrowserKit\Client as BaseClient;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\BrowserKit\Request;

class Client extends BaseClient
{
    private $headers = array();

    /**
     * @param Request $request
     * @return Response
     */
    protected function doRequest($request)
    {
        $params = array(
            'url' => $request->getUri(),
            'headers' => $this->headers
        );

        $cmd = "phantomjs " . __DIR__ . "/phantomjs/basic.js " . base64_encode(json_encode($params));

        $response = json_decode(`$cmd`);

        return new Response($response->content, 200, array());
    }


    public function setHeaders($headers) {
        $this->headers = $headers;
    }

    public function addHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    public function removeHeader($name)
    {
        unset($this->headers[$name]);
    }
}
