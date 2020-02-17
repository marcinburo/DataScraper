<?php

namespace App\Tests\videx;

use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class HttpResponseMock
 * @package App\Tests\videx
 */
class HttpResponseMock implements ResponseInterface
{
    /**
     * @var string
     */
    private $dataSource;

    /**
     * HttpResponseMock constructor.
     * @param string $dataSource
     */
    public function __construct(string $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @const CORRECT_DATA_FILE
     */
    const CORRECT_DATA_FILE = 'tests/videx/data/videx_correct.html';

    /**
     * @const INCORRECT_DATA_FILE
     */
    const INCORRECT_DATA_FILE = 'tests/videx/data/videx_incorrect.html';

    /**
     * @return int
     */
    public function getStatusCode() : int
    {
        return 200;
    }

    /**
     * @param bool $throw
     * @return array
     */
    public function getHeaders(bool $throw = true) : array
    {
        return [];
    }

    /**
     * @param bool $throw
     * @return string
     */
    public function getContent(bool $throw = true) : string
    {
        return file_get_contents($this->dataSource);
    }

    /**
     * @param bool $throw
     * @return array
     */
    public function toArray(bool $throw = true) : array
    {
        return [];
    }

    public function cancel() : void
    {
    }

    /**
     * @param string|null $type
     * @return array|mixed|void|null
     */
    public function getInfo(string $type = null)
    {
    }
}