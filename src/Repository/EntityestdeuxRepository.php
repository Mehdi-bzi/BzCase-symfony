<?php

namespace App\Repository;

use App\Entity\Entityestdeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entityestdeux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entityestdeux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entityestdeux[]    findAll()
 * @method Entityestdeux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntityestdeuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entityestdeux::class);
    }

    // /**
    //  * @return Entityestdeux[] Returns an array of Entityestdeux objects
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
    public function findOneBySomeField($value): ?Entityestdeux
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
