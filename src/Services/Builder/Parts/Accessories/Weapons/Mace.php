<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Weapons;

class Mace extends AbstractWeapon
{

    /**
     * [__construct Mace constructor]
     * @param float $maxPower Maximum power [optional]
     */
    public function __construct(int $maxPower = 15)
    {
        parent::__construct('mace', mt_rand(5, $maxPower));
    }

}
