<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Services\Builder\Parts\Character;

/**
 * @ORM\Entity(repositoryClass=MonsterRepository::class)
 */
class Monster extends Character
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Weapon::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $leftHand;

    /**
     * @ORM\OneToOne(targetEntity=Weapon::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $rightHand;

    /**
     * @ORM\OneToOne(targetEntity=Armor::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $body;

    /**
     * @ORM\Column(type="integer")
     */
    private $health;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

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

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;

        return $this;
    }
}
