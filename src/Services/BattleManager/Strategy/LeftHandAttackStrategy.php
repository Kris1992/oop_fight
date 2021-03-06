<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Strategy;

class LeftHandAttackStrategy implements StrategyInterface
{

    public function attack(float $power): float
    {   
        /* Left hand is less powerfull than right */
        return $power/2;
    }

}
