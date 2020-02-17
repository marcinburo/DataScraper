<?php

namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;
use App\Model\VidexDataModel;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class VidexDataScraperService
 * @package App\Service
 */
class VidexDataScraperService extends BaseScraperService implements DataScraperServiceInterface
{
    /**
     * @const DEFAULT_URL
     */
    const DEFAULT_URL = 'https://videx.comesconnected.com/';

    /**
     * @param string|null $url
     * @return string
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getScrapedData(string $url = null): string
    {
        $pageContent = '';
        $results = [];

        try {
            $pageSource = $this->getPageSource($url??self::DEFAULT_URL);
            $pageContent = $pageSource->getContent();
        }catch(\Exception $e){
//            TODO: rethrow error here and catch it later in order to show problem with fetching source of given web page
        }

        $crawler = new Crawler($pageContent);
        $crawler->filter('.package')->each(function (Crawler $node, $i) use (&$results) {
            $offer = new VidexDataModel();
            $offer->setOptionTitle($node->filter('.header')->text());
            $offer->setDescription($node->filter('.package-name')->text());
            $offer->setDiscount($node->filter('.package-name')->text());
            $offer->setPrice($node->filter('.package-data')->text());

            $results[] = $offer->toArray();
        });

        return json_encode($results, JSON_PRETTY_PRINT);
    }
}