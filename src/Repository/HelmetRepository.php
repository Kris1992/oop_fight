<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Helmet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Helmet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Helmet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Helmet[]    findAll()
 * @method Helmet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HelmetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Helmet::class);
    }

}
