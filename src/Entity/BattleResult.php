<?php

namespace App\Entity;

use App\Repository\BattleResultRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BattleResultRepository::class)
 */
class BattleResult
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $toursNumber;

    public function __construct($winner, $loser, int $toursNumber)
    {
        $this->setToursNumber($toursNumber);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToursNumber(): ?int
    {
        return $this->toursNumber;
    }

    public function setToursNumber(int $toursNumber): self
    {
        $this->toursNumber = $toursNumber;

        return $this;
    }

}
