<?php
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Modifiers;

trait ModifyPowerTrait
{   

    use LuckyFactorTrait;

    /**
     * [modifyPower Modify power of Weapon]
     * @param  float  $power Base power
     * @param  int  $multiplier Possible multiplier of modification
     * @return float         Modified power
     */
    private function modifyPower(float $power, int $multiplier): float
    {

        $this->randomizeLucky();
        if ($this->isLucky) {
            return $power*mt_rand(0, $multiplier);
        }

        return $power;

    }

}

