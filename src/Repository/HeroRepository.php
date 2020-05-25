<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Hero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Hero|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hero|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hero[]    findAll()
 * @method Hero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hero::class);
    }

    /**
     * findAllQuery Find all heros
     * @return Query
     */
    public function findAllQuery(): Query
    {   
        return $this->createQueryBuilder('h')
            ->join('h.body', 'b')
            ->addSelect('b')
            ->join('h.foots', 'f')
            ->addSelect('f')
            ->join('h.head', 'hd')
            ->addSelect('hd')
            ->join('h.leftHand', 'lh')
            ->addSelect('lh')
            ->join('h.rightHand', 'rh')
            ->addSelect('rh')
            ->getQuery()
        ; 
    }

    /**
     * findAllByIds Find all Heros with given ids
     * @param  array  $arrayIds Array with at least one id
     * @return Hero[]
     */
    public function findAllByIds(array $arrayIds)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.id IN(:ids)')
            ->setParameter('ids', $arrayIds)
            ->getQuery()
            ->getResult()
            ;
    }

}
