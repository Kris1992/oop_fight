<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Helmets;

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
    
}
