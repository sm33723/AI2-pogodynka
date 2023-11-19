<?php
declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\City;

class ForecastUtil
{
    private EntityManagerInterface $entity_manager;

    public function __construct(EntityManagerInterface $entity_manager)
    {
        $this->entity_manager = $entity_manager;
    }

    public function findByCity(City $city)
    {
        $qb = $this->entity_manager->createQueryBuilder();
        return $qb->select("f")
            ->from("App\Entity\Forecast",'f')
            ->where("f.city = :city")
            ->setParameter("city",$city)
            ->orderBy("f.timestamp")
            ->getQuery()
            ->getResult();
    }

    public function findByCountryCodeAndCityName(
        string $country_code,
        string $city_name,
    ){
        $qb = $this->entity_manager->createQueryBuilder();
        $city = $qb->select("c")
            ->from("App\Entity\City",'c')
            ->where("c.name = :city_name")
            ->setParameter("city_name",$city_name)
            ->andWhere("c.country = :country_code")
            ->setParameter("country_code",$country_code)
            ->getQuery()
            ->getSingleResult();
        return  $this->findByCity($city);
    }
}