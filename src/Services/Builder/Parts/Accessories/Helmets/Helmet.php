<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Helmets;

use App\Entity\Helmet as EntityHelmet;

/* Not abstract because I want initialize it */
class Helmet
{

    protected $name;

    protected $shieldFactor;

    public function __construct(string $name, int $shieldFactor)
    {
        $this->name = $name;
        $this->shieldFactor = $shieldFactor;
    }

    public function getHelmet(): EntityHelmet
    {
        return new EntityHelmet($this->name, $this->shieldFactor);
    }
    
}
