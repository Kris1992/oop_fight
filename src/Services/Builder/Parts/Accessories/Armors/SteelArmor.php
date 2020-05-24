<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Armors;

use App\Services\Builder\Parts\Accessories\Modifiers\ModifyQualityTrait;

class SteelArmor extends AbstractArmor
{

    use ModifyQualityTrait;

    private $baseName = 'Steel Armor';
    
    private $baseShield = 150;

    public function __construct()
    {   
        $data = $this->modifyQuality($baseName, $baseShield, 40);
        parent::__construct($this->baseName, $this->baseShield);
    }

}
