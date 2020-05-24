<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Weapons;

use App\Entity\Weapon;

abstract class AbstractWeapon
{

    protected $name;

    protected $power;

    public function __construct(string $name, float $power)
    {
        $this->name = $name;
        $this->power = $power;
    }

    /**
     * [getWeapon Return Weapon Entity Object]
     * @return Weapon
     */
    public function getWeapon(): Weapon
    {
        return new Weapon($this->name, $this->power);
    }

}
