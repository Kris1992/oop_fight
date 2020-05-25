<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Weapons;

class Fist extends AbstractWeapon
{

    /**
     * [__construct Fist constructor]
     * @param int $maxPower Maximum power [optional]
     */
    public function __construct(int $maxPower = 8)
    {
        parent::__construct('fist', mt_rand(5, $maxPower));
    }

}
