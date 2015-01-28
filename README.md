# IpInfoDb

[ipinfodb.com](http://ipinfodb.com) PHP API Client. You have to register for an API key first.

## Install

You can install the library using composer:

    "require" : {
        "pabloprieto/ipinfodb" : "v1.0"
    }

## Usage

Country precision (faster) :

    $ipInfo = new IpInfoDb('your_api_key');
    $response = $ipInfo->country($_SERVER['REMOTE_ADDR']);
    
    if ($response->isSuccess()) {
        echo $response->getCountryName();
    } else {
        echo $response->getStatusMessage();
    }

City precision :

    $ipInfo = new IpInfoDb('your_api_key');
    $response = $ipInfo->city($_SERVER['REMOTE_ADDR']);
    
    if ($response->isSuccess()) {
        echo $response->getCityName();
    } else {
        echo $response->getStatusMessage();
    }

## HTTP Adapters

This library plays nice the most popular http clients by using [egeloen/ivory-http-adapter](https://github.com/egeloen/ivory-http-adapter) to issue HTTP requests.
You can pass any Ivory\HttpAdapter\HttpAdapterInterface instance to the constructor. The Curl adapter is used by default.

Example using Guzzle :

    use GuzzleHttp\Client;
    use Ivory\HttpAdapter\GuzzleHttpHttpAdapter;
    
    $httpAdapter = new GuzzleHttpHttpAdapter();
    $ipInfo = new IpInfoDb('your_api_key', $httpAdapter);
