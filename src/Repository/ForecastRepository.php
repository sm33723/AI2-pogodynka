<?php

namespace App\Repository;

use App\Entity\City;
use App\Entity\Forecast;

use DateTime;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Forecast>
 *
 * @method Forecast|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forecast|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forecast[]    findAll()
 * @method Forecast[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForecastRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forecast::class);
    }
    public function findByCity(City $city)
    {
        $qb = $this->createQueryBuilder('m');
        $qb->where('m.city = :city')
            ->setParameter('city', $city)
            ->andWhere('m.timestamp > :now')
            ->setParameter('now', new DateTime("now"));

        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }

//    /**
//     * @return Forecast[] Returns an array of Forecast objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Forecast
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
