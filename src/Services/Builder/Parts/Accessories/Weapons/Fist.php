<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Weapons;

class Fist extends AbstractWeapon
{

    /**
     * [__construct Fist constructor]
     */
    public function __construct()
    {
        parent::__construct('fist', mt_rand(5, 8));
    }

}
