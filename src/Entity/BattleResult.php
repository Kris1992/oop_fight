<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\BattleResultRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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

    /**
     * @ORM\ManyToOne(targetEntity=AbstractCharacter::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $winner;

    /**
     * @ORM\ManyToOne(targetEntity=AbstractCharacter::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $loser;

    /**
     * @ORM\ManyToOne(targetEntity=AbstractCharacter::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $firstParticipant;

    /**
     * @ORM\ManyToOne(targetEntity=AbstractCharacter::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $secondParticipant;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

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

    public function getWinner(): ?AbstractCharacter
    {
        return $this->winner;
    }

    public function setWinner(?AbstractCharacter $winner): self
    {
        $this->winner = $winner;

        return $this;
    }

    public function getLoser(): ?AbstractCharacter
    {
        return $this->loser;
    }

    public function setLoser(?AbstractCharacter $loser): self
    {
        $this->loser = $loser;

        return $this;
    }

    public function getFirstParticipant(): ?AbstractCharacter
    {
        return $this->firstParticipant;
    }

    public function setFirstParticipant(?AbstractCharacter $firstParticipant): self
    {
        $this->firstParticipant = $firstParticipant;

        return $this;
    }

    public function getSecondParticipant(): ?AbstractCharacter
    {
        return $this->secondParticipant;
    }

    public function setSecondParticipant(?AbstractCharacter $secondParticipant): self
    {
        $this->secondParticipant = $secondParticipant;

        return $this;
    }

    public function __toString()
    {   

        $description = '';
        $toursNumber = $this->getToursNumber();
        if ($this->getWinner()) {
            if ($toursNumber > 15) {
                $description = sprintf('The long and exhausting battle between %s and %s takes %d tours. And the winner is: %s!!', $this->getFirstParticipant()->getName(), $this->getSecondParticipant()->getName(), $toursNumber, $this->getWinner()->getName());
            } else {
                $description = sprintf('This was fast battle between %s and %s takes just %d tours. And the winner is: %s!!', $this->getFirstParticipant()->getName(), $this->getSecondParticipant()->getName(), $toursNumber, $this->getWinner()->getName());
            }

        } else {
            $description = sprintf('The battle between %s and %s takes %d tours. And both of warriors fall from fatigue. There is no winner!!', $this->getFirstParticipant()->getName(), $this->getSecondParticipant()->getName(), $toursNumber);
        }
        
        return $description;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /*public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }*/

}
