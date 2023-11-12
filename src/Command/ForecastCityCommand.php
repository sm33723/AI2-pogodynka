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
    name: 'forecast:city',
    description: 'command to check weather in given city',
)]
class ForecastCityCommand extends Command
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
            ->addArgument('city_id', InputArgument::REQUIRED, 'city id to show forecast for')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $city_id = $input->getArgument('city_id');

        $city = $this->cityUtil->getById($city_id);
        $forecasts = $this->forecastUtil->findByCity($city);

        echo "forecast for city: $city\n";

        foreach( $forecasts as $forecast ){
            echo $forecast->getTimestamp()->format("Y-m-d H:i") . " | " ;
            echo $forecast->getTemperature() . "C";
            echo "\n";
        }

        return Command::SUCCESS;
    }
}
