<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\HeroRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroRepository::class)
 */
class Hero extends AbstractCharacter
{

    /**
     * @ORM\OneToOne(targetEntity=Weapon::class, cascade={"persist", "remove"})
     */
    protected $rightHand;

    /**
     * @ORM\OneToOne(targetEntity=Weapon::class, cascade={"persist", "remove"})
     */
    protected $leftHand;

    /**
     * @ORM\OneToOne(targetEntity=Helmet::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $head;

    /**
     * @ORM\OneToOne(targetEntity=Armor::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $body;

    /**
     * @ORM\OneToOne(targetEntity=Boots::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $foots;

    public function getRightHand(): ?Weapon
    {
        return $this->rightHand;
    }

    public function setRightHand(?Weapon $rightHand): self
    {
        $this->rightHand = $rightHand;

        return $this;
    }

    public function getLeftHand(): ?Weapon
    {
        return $this->leftHand;
    }

    public function setLeftHand(?Weapon $leftHand): self
    {
        $this->leftHand = $leftHand;

        return $this;
    }

    public function getHead(): ?Helmet
    {
        return $this->head;
    }

    public function setHead(Helmet $head): self
    {
        $this->head = $head;

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

    public function getFoots(): ?Boots
    {
        return $this->foots;
    }

    public function setFoots(Boots $foots): self
    {
        $this->foots = $foots;

        return $this;
    }

}
