<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Weapons;

use App\Services\Builder\Parts\Accessories\Modifiers\ModifyPowerTrait;

class ColdSteel extends AbstractWeapon
{

    use ModifyPowerTrait;

    /**
     * [__construct ColdSteel constructor]
     * @param string $name  Name of ColdSteel Weapon
     * @param float  $power Initial Power of ColdSteel Waeapon
     */
    public function __construct(string $name, float $power)
    {
        parent::__construct($name, $this->modifyPower($power, 2));
    }

}
