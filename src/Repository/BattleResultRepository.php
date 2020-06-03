<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\BattleResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

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

    /**
     * findAllQuery Find all battle results
     * @return Query
     */
    public function findAllQuery(): Query
    {   
        return $this->createQueryBuilder('br')
            ->join('br.firstParticipant', 'fp')
            ->addSelect('fp')
            ->join('br.secondParticipant', 'sp')
            ->addSelect('sp')
            ->orderBy('br.createdAt', 'DESC')
            ->getQuery()
        ; 
    }
    
}
