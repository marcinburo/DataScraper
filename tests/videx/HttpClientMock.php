<?php

namespace App\Tests\videx;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseStreamInterface;
use Symfony\Component\HttpClient\MockHttpClient;

/**
 * Class HttpClientMock
 * @package App\Tests\videx
 */
class HttpClientMock extends MockHttpClient
{
    public function __construct($responseFactory = null, string $baseUri = null, string $dataSource)
    {
        $mockResponse = new HttpResponseMock($dataSource);
        parent::__construct($mockResponse, $baseUri);
    }
}