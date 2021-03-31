<?php

namespace App\Repository;

use App\Entity\Gasoline;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gasoline|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gasoline|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gasoline[]    findAll()
 * @method Gasoline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GasolineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gasoline::class);
    }

    // /**
    //  * @return Gasoline[] Returns an array of Gasoline objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gasoline
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
