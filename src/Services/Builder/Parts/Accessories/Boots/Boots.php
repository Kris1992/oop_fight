<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Boots;

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
    
}
