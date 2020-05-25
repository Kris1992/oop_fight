<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Strategy;

class RightHandAttackStrategy implements StrategyInterface
{

    public function attack(float $power): float
    {   
        /* Right hand is more powerfull than left */
        return $power*2;
    }

}
