<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Boots;

use App\Entity\Boots as BootsEntity;

/* Not abstract because I want initialize it */
class Boots
{

    protected $name;

    protected $shieldFactor;

    public function __construct(string $name = 'Boots', int $shieldFactor = 20)
    {
        $this->name = $name;
        $this->shieldFactor = $shieldFactor;
    }

    public function getBoots(): BootsEntity
    {
        return new BootsEntity($this->name, $this->shieldFactor);
    }
    
}
