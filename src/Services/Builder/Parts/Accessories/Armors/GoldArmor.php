<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Armors;

use App\Services\Builder\Parts\Accessories\Modifiers\ModifyQualityTrait;

class GoldArmor extends AbstractArmor
{

    use ModifyQualityTrait;

    private $baseName = 'Gold Armor';
    
    private $baseShield = 300;

    public function __construct()
    {   
        $data = $this->modifyQuality($baseName, $baseShield, 150);
        parent::__construct($data['name'], $data['shield']);
    }

}
