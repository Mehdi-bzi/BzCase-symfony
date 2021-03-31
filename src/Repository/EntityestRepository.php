<?php

namespace App\Repository;

use App\Entity\Entityest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entityest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entityest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entityest[]    findAll()
 * @method Entityest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntityestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entityest::class);
    }

    // /**
    //  * @return Entityest[] Returns an array of Entityest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entityest
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
