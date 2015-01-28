<?php

use IpInfoDb\IpInfoDb;
use IpInfoDb\Response;

class IpInfoDbTest extends \PHPUnit_Framework_TestCase
{

    protected $apiKey;

    public function setUp()
    {
        $this->apiKey = getenv('API_KEY');
    }

    public function testCountry()
    {
        $ipInfo = new IpInfoDb($this->apiKey);

        $expected = new Response([
            'statusCode' => 'OK',
            'statusMessage' => '',
            'ipAddress' => '8.8.8.8',
            'countryCode' => 'US',
            'countryName' => 'United States'
        ]);

        $actual = $ipInfo->country('8.8.8.8');

        $this->assertEquals($expected, $actual);
    }

    public function testCity()
    {
        $ipInfo = new IpInfoDb($this->apiKey);

        $expected = new Response([
            'statusCode' => 'OK',
            'statusMessage' => '',
            'ipAddress' => '8.8.8.8',
            'countryCode' => 'US',
            'countryName' => 'United States',
            'regionName' => 'California',
            'cityName' => 'Mountain View',
            'zipCode' => '94043',
            'latitude' => '37.406',
            'longitude' => '-122.079',
            'timeZone' => '-08:00'
        ]);

        $actual = $ipInfo->city('8.8.8.8');

        $this->assertEquals($expected, $actual);
    }

}
