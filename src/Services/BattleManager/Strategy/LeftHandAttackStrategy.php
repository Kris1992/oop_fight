<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Strategy;

class LeftHandAttackStrategy implements StrategyInterface
{

    public function attack(int $power): int
    {   
        /* Left hand is less powerfull than right */
        return intval($power/2);
    }

}
