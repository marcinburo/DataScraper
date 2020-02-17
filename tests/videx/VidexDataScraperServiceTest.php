<?php

namespace App\Tests\videx;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\videx\HttpResponseMock;

/**
 * Class VidexDataScraperServiceTest
 * @package App\Tests\videx
 */
class VidexDataScraperServiceTest extends WebTestCase
{
    public function testGetScrapedDataOk()
    {
        self::bootKernel();

        $container = self::$container;

        $container->set('Symfony\Contracts\HttpClient\HttpClientInterface', new HttpClientMock(null, null,HttpResponseMock::CORRECT_DATA_FILE));
        $dataScraperService = $container->get('App\Service\VidexDataScraperService');
        $scrapedData = $dataScraperService->getScrapedData();
        $expectedData = json_encode($this->prepareTestData(), JSON_PRETTY_PRINT);

        $this->assertEquals($scrapedData, $expectedData);
    }

    public function testGetScrapedDataFail()
    {
        self::bootKernel();

        $container = self::$container;

        $container->set('Symfony\Contracts\HttpClient\HttpClientInterface', new HttpClientMock(null, null,HttpResponseMock::INCORRECT_DATA_FILE));
        $dataScraperService = $container->get('App\Service\VidexDataScraperService');
        $scrapedData = $dataScraperService->getScrapedData();
        $expectedData = json_encode($this->prepareTestData(), JSON_PRETTY_PRINT);

        $this->assertNotEquals($scrapedData, $expectedData);
    }

    /**
     * @return array
     */
    private function prepareTestData()
    {
        return [
            [
                'optionTitle'   => 'Option 40 Mins',
                'description'   => 'Up to 40 minutes talk time per monthincluding 20 SMS(5p / minute and 4p / SMS thereafter)',
                'discount'      => 'Up to 40 minutes talk time per monthincluding 20 SMS(5p / minute and 4p / SMS thereafter)',
                'price'         => '12 Months - Voice & SMS Service Only'
            ],
            [
                'optionTitle'   => 'Option 160 Mins',
                'description'   => 'Up to 160 minutes talk time per monthincluding 35 SMS(5p / minute and 4p / SMS thereafter)',
                'discount'      => 'Up to 160 minutes talk time per monthincluding 35 SMS(5p / minute and 4p / SMS thereafter)',
                'price'         => '12 Months - Voice & SMS Service Only'
            ],
            [
                'optionTitle'   => 'Option 300 Mins',
                'description'   => '300 minutes talk time per monthincluding 40 SMS(5p / minute and 4p / SMS thereafter)',
                'discount'      => '300 minutes talk time per monthincluding 40 SMS(5p / minute and 4p / SMS thereafter)',
                'price'         => '12 Months - Voice & SMS Service Only'
            ],
            [
                'optionTitle'   => 'Option 480 Mins',
                'description'   => 'Up to 480 minutes talk time per yearincluding 240 SMS(5p / minute and 4p / SMS thereafter)',
                'discount'      => 'Up to 480 minutes talk time per yearincluding 240 SMS(5p / minute and 4p / SMS thereafter)',
                'price'         => '12 Months - Voice & SMS Service Only'
            ],
            [
                'optionTitle'   => 'Option 2000 Mins',
                'description'   => 'Up to 2000 minutes talk time per year including 420 SMS(5p / minute and 4p / SMS thereafter)',
                'discount'      => 'Up to 2000 minutes talk time per year including 420 SMS(5p / minute and 4p / SMS thereafter)',
                'price'         => '12 Months - Voice & SMS Service Only'
            ],
            [
                'optionTitle'   => 'Option 3600 Mins',
                'description'   => 'Up to 3600 minutes talk time per year including 480 SMS(5p / minute and 4p / SMS thereafter)',
                'discount'      => 'Up to 3600 minutes talk time per year including 480 SMS(5p / minute and 4p / SMS thereafter)',
                'price'         => '12 Months - Voice & SMS Service Only'
            ]
        ];
    }
}