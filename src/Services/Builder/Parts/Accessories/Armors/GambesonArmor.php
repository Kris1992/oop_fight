<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Armors;

class GambesonArmor extends AbstractArmor
{   

    private $baseName = 'Gambeson Armor';
    
    private $baseShield = 50;

    public function __construct()
    {   
        parent::__construct($this->baseName, $this->baseShield);
    }

}
