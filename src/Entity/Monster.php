<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MonsterRepository::class)
 */
class Monster extends AbstractCharacter
{

    /**
     * @ORM\OneToOne(targetEntity=Weapon::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $leftHand;

    /**
     * @ORM\OneToOne(targetEntity=Weapon::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $rightHand;

    /**
     * @ORM\OneToOne(targetEntity=Armor::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $body;

    public function getLeftHand(): ?Weapon
    {
        return $this->leftHand;
    }

    public function setLeftHand(Weapon $leftHand): self
    {
        $this->leftHand = $leftHand;

        return $this;
    }

    public function getRightHand(): ?Weapon
    {
        return $this->rightHand;
    }

    public function setRightHand(Weapon $rightHand): self
    {
        $this->rightHand = $rightHand;

        return $this;
    }

    public function getBody(): ?Armor
    {
        return $this->body;
    }

    public function setBody(Armor $body): self
    {
        $this->body = $body;

        return $this;
    }
    
}
