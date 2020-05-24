<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\HelmetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HelmetRepository::class)
 */
class Helmet
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
     * @ORM\Column(type="integer")
     */
    private $shieldFactor;

    public function __construct(string $name, int $shieldFactor)
    {
        $this->setName($name);
        $this->setShieldFactor($shieldFactor);
    }

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

    public function getShieldFactor(): ?int
    {
        return $this->shieldFactor;
    }

    public function setShieldFactor(int $shieldFactor): self
    {
        $this->shieldFactor = $shieldFactor;

        return $this;
    }

    public function __toString()
    {
        return sprintf('%s: %s', ucfirst($this->getName()), $this->getShieldFactor());
    }

}
