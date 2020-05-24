<?php

namespace App\Repository;

use App\Entity\Boots;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Boots|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boots|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boots[]    findAll()
 * @method Boots[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BootsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boots::class);
    }

    // /**
    //  * @return Boots[] Returns an array of Boots objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Boots
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
