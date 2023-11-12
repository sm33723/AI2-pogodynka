<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Service\ForecastUtil;
use App\Service\CityUtil;

#[AsCommand(
    name: 'city:location',
)]
class CityLocationCommand extends Command
{
    private CityUtil $cityUtil;
    private ForecastUtil $forecastUtil;
    public function __construct(
        CityUtil $cityUtil,
        ForecastUtil $forecastUtil,
    )
    {
        $this->cityUtil = $cityUtil;
        $this->forecastUtil = $forecastUtil;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('country_code',InputArgument::REQUIRED, 'Country Code')
            ->addArgument('city_name', InputArgument::REQUIRED, 'City Name')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $country_code = $input->getArgument('country_code');
        $city_name = $input->getArgument('city_name');

        $city = $this->cityUtil->getByCountryCodeAndName(
            $country_code, $city_name
        );

        echo json_encode([
            "name"   => $city->getName(),
            "country"=> $city->getCountry(),
            "lot"    => $city->getLot(),
            "lat"    => $city->getLat(),
        ],JSON_PRETTY_PRINT);
        echo "\n";


        return Command::SUCCESS;
    }
}
