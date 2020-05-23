<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Weapons;

abstract class AbstractWeapon
{
    protected $name;

    protected $power;

    public function __construct(string $name, float $power)
    {
        $this->name = $name;
        $this->power = $power;
    }
}