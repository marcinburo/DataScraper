<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpClient\Response\NativeResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class BaseScraperService
 * @package App\Service
 */
class BaseScraperService
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * BaseScraperService constructor.
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function getPageSource(string $url) : ResponseInterface
    {
        $response = $this->httpClient->request('GET', $url);
        $statusCode = $response->getStatusCode();

        if($statusCode == Response::HTTP_OK){
            return $response;
        }else{
//            TODO: throw custom exception here
        }
    }
}