<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\AbstractCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method AbstractCharacter|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbstractCharacter|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbstractCharacter[]    findAll()
 * @method AbstractCharacter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbstractCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbstractCharacter::class);
    }

}
