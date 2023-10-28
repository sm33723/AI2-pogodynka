<?php

namespace App\Controller;

use App\Entity\City;
use App\Repository\ForecastRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForecastController extends AbstractController
{
//    #[Route('/forecast/{id}', name: 'app_city', condition: "params['id']>=0")]
    #[Route('/forecast/{id}', name: 'app_city', requirements: ['id' => '\d+'])]
    public function index(City $city,ForecastRepository $repository): Response
    {
        $forecasts = $repository->findByCity($city);


        return $this->render('forecast/city.html.twig', [
            'controller_name' => 'ForecastController',
            'forecasts' => $forecasts,
            'city' => $city,
        ]);
    }
}
