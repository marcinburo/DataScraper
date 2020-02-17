<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\DataScraperServiceInterface;

/**
 * Class ScrapeDataCommand
 * @package App\Command
 */
class ScrapeDataCommand extends Command
{
    /**
     * @var DataScraperServiceInterface
     */
    private $dataScraperService;

    /**
     * @var string
     */
    protected static $defaultName = 'scraper:scrape-data';

    /**
     * ScrapeDataCommand constructor.
     * @param string|null $name
     * @param DataScraperServiceInterface $dataScraperService
     */
    public function __construct(string $name = null, DataScraperServiceInterface $dataScraperService)
    {
        parent::__construct($name);

        $this->dataScraperService = $dataScraperService;
    }

    protected function configure()
    {
        $this->setDescription('Ths command main task is to scrape data from web page');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $result = $this->dataScraperService->getScrapedData();
        $io->writeln($result);
        $io->success('Data has been scraped successfully.');

        return 0;
    }
}
