<?php
declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\City;

class CityUtil
{
    private EntityManagerInterface $entity_manager;

    public function __construct(EntityManagerInterface $entity_manager)
    {
        $this->entity_manager = $entity_manager;
    }

    public function getById(int $id)
    {
        $qb = $this->entity_manager->createQueryBuilder();
        return $qb->select('c')
            ->from("App\Entity\City",'c')
            ->where("c.id = :id")
            ->setParameter("id",$id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getByCountryCodeAndName(
        string $country_code,
        string $city_name,
    ){
        $qb = $this->entity_manager->createQueryBuilder();
        return $qb->select('c')
            ->from("App\Entity\City",'c')
            ->where("c.name = :city_name")
            ->setParameter("city_name",$city_name)
            ->andWhere("c.country = :country_code")
            ->setParameter("country_code",$country_code)
            ->getQuery()
            ->getOneOrNullResult();
    }
}