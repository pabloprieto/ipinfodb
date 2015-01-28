<?php

namespace IpInfoDb;

use Ivory\HttpAdapter\CurlHttpAdapter;
use Ivory\HttpAdapter\HttpAdapterInterface;

class IpInfoDb
{

    /**
     * @const string API base url
     */
    const BASE_URL = 'https://api.ipinfodb.com';

    /**
     * @const string API version
     */
    const API_VERSION = 'v3';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var HttpAdapterInterface
     */
    protected $httpAdapter;

    /**
     * @param string               $apiKey
     * @param HttpAdapterInterface $httpAdapter
     */
    public function __construct($apiKey, HttpAdapterInterface $httpAdapter = null)
    {
        $this->apiKey = $apiKey;
        $this->httpAdapter = $httpAdapter;
    }

    /**
     * @param  string $ip
     * @return Response
     */
    public function country($ip)
    {
        return $this->send('ip-country', $ip);
    }

    /**
     * @param  string $ip
     * @return Response
     */
    public function city($ip)
    {
        return $this->send('ip-city', $ip);
    }

    /**
     * @param HttpAdapterInterface $adapter
     */
    public function setHttpAdapter(HttpAdapterInterface $adapter)
    {
        $this->httpAdapter = $adapter;
    }

    /**
     * @return HttpAdapterInterface
     */
    public function getHttpAdapter()
    {
        if (!$this->httpAdapter) {
            $this->httpAdapter = new CurlHttpAdapter();
        }

        return $this->httpAdapter;
    }

    /**
     * @param  string $endpoint
     * @param  string $ip
     * @return Response
     */
    protected function send($endpoint, $ip)
    {
        $params = [
            'ip'     => $ip,
            'key'    => $this->apiKey,
            'format' => 'json'
        ];

        $url  = self::BASE_URL . '/' . self::API_VERSION . '/' . $endpoint;
        $url .= '?' . http_build_query($params);

        $response = $this->getHttpAdapter()->get($url);
        $content = json_decode($response->getBody()->getContents(), true);

        return new Response($content);
    }

}
