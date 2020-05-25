<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Strategy;

interface StrategyInterface
{

    /**
     * [attack Attack method]
     * @param  float    $power Initial power of attack
     * @return float    $damage
     */
    public function attack(float $power): float;

}
