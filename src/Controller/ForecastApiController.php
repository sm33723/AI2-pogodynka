<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpFoundation\Response;

use App\Service\ForecastUtil;
use App\Entity\Forecast;

class ForecastApiController extends AbstractController
{
    private ForecastUtil $forecastUtil;

    public function __construct(
        ForecastUtil $forecastUtil,
    )
    {
        $this->forecastUtil = $forecastUtil;
    }

    #[Route('/api/v1/forecast', name: 'app_forecast_api')]
    public function index(
        #[MapQueryParameter] string $city,
        #[MapQueryParameter] string $country,
        #[MapQueryParameter] string $format = "json",
        #[MapQueryParameter('twig')] bool $twig = false,
    ): Response
    {
        $forecasts = $this->forecastUtil->findByCountryCodeAndCityName(
            $country, $city
        );
        $arr = [
            "city" => $city,
            "country" => $country,
            "forecasts" => array_map(fn(Forecast $f) => [
                'temperature' => $f->getTemperature(),
                'timestamp' => $f->getTimestamp(),
                'fahrenheit' => $f->getFahrenheit(),
            ], $forecasts),
        ];

        if($twig == true){
            if($format == "json"){
                return $this->render(
                    "forecast_api/index.json.twig",
                    $arr
                );
            }
            return $this->render(
                "forecast_api/index.csv.twig",
                $arr
            );
        }

        if($format == "json") {
            return new JsonResponse($arr);
        }
        $csv = "";

        foreach($arr["forecasts"] as $row){
            $csv .= sprintf(
                "%s,%s,%f,%s,%f\n",
                $arr["city"],
                $arr["country"],
                $row["temperature"],
                $row["timestamp"]->format("c"),
                $row["fahrenheit"]
            );
        }

        $response = new Response($csv);
        $response->headers->set('Content-Type', 'text/csv');

        return $response;
    }
}
