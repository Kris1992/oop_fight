<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Monster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Monster|null find($id, $lockMode = null, $lockVersion = null)
 * @method Monster|null findOneBy(array $criteria, array $orderBy = null)
 * @method Monster[]    findAll()
 * @method Monster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonsterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Monster::class);
    }

    /**
     * findAllQuery Find all monsters
     * @return Query
     */
    public function findAllQuery(): Query
    {   
        return $this->createQueryBuilder('m')
            ->getQuery()
        ; 
    }

    /**
     * findAllByIds Find all Monsters with given ids
     * @param  array  $arrayIds Array with at least one id
     * @return Monster[]
     */
    public function findAllByIds(array $arrayIds)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.id IN(:ids)')
            ->setParameter('ids', $arrayIds)
            ->getQuery()
            ->getResult()
            ;
    }

}
