<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\BattleResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BattleResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method BattleResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method BattleResult[]    findAll()
 * @method BattleResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BattleResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BattleResult::class);
    }

    // /**
    //  * @return BattleResult[] Returns an array of BattleResult objects
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
    public function findOneBySomeField($value): ?BattleResult
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
