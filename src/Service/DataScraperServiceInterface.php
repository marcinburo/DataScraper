<?php


namespace App\Service;


interface DataScraperServiceInterface
{
    /**
     * @return string
     */
    public function getScrapedData() : string;
}