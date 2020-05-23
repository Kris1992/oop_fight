<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Weapons;

use App\Services\Builder\Parts\Accessories\Modifiers\LuckyFactorTrait;

class Firearm extends AbstractWeapon
{
    use LuckyFactorTrait;

    public function __construct(string $name, float $power)
    {
        parent::__construct($name, $this->modifyPower($power));
    }

    public function modifyPower(float $power)
    {
        $this->randomizeLucky();
        if ($this->isLucky) {
            return $power*3;
        }
        
        return $power;
    }
}