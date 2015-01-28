<?php

namespace IpInfoDb;

class Response
{

    /**
     * @var array
     */
    protected $content;

    /**
     * @param array $content
     */
    public function __construct($content = array())
    {
        $this->content = array_merge([
            'statusCode'    => '',
            'statusMessage' => '',
            'ipAddress'     => '',
            'countryCode'   => '',
            'countryName'   => '',
            'regionName'    => '',
            'cityName'      => '',
            'zipCode'       => '',
            'latitude'      => '',
            'longitude'     => '',
            'timeZone'      => '',
        ], $content);
    }

    /**
     * @return bool
     */
    public function isError()
    {
        return $this->content['statusCode'] == 'ERROR';
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->content['statusCode'] == 'OK';
    }

    /**
     * @return object
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->content['statusCode'];
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->content['statusMessage'];
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->content['ipAddress'];
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->content['countryCode'];
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->content['countryName'];
    }

    /**
     * @return string
     */
    public function getRegionName()
    {
        return $this->content['regionName'];
    }

    /**
     * @return string
     */
    public function getCityName()
    {
        return $this->content['cityName'];
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->content['zipCode'];
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return (float) $this->content['latitude'];
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return (float) $this->content['longitude'];
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->content['timeZone'];
    }

}
