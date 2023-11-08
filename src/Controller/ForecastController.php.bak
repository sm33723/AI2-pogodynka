<?php

namespace App\Controller;

use App\Entity\City;
use App\Repository\ForecastRepository;

use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForecastController extends AbstractController
{
//    #[Route('/forecast/{id}', name: 'app_city', condition: "params['id']>=0")]
//    #[Route('/forecast/{id}', name: 'app_city', requirements: ['id' => '\d+'])]
//    public function by_id(City $city,ForecastRepository $repository): Response
//    {
//        $forecasts = $repository->findByCity($city);
//
//
//        return $this->render('forecast/city.html.twig', [
//            'controller_name' => 'ForecastController',
//            'forecasts' => $forecasts,
//            'city' => $city,
//        ]);
//    }

    #[Route('/forecast/{name}', name: 'app_city', defaults: ["name"=>"Szczecin"])]
    public function index(
        #[MapEntity(mapping: ['name' => 'name'])] City $city,
        ForecastRepository $repository
    ): Response
    {
        $forecasts = $repository->findByCity($city);


        return $this->render('forecast/city.html.twig', [
            'controller_name' => 'ForecastController',
            'forecasts' => $forecasts,
            'city' => $city,
        ]);
    }
}
