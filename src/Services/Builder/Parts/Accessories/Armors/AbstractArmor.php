<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Armors;

use App\Entity\Armor;

abstract class AbstractArmor
{

    protected $name;

    protected $shieldFactor;

    public function __construct(string $name, int $shieldFactor)
    {
        $this->name = $name;
        $this->shieldFactor = $shieldFactor;
    }

    public function getArmor(): Armor
    {
        return new Armor($this->name, $this->shieldFactor);
    }

}
