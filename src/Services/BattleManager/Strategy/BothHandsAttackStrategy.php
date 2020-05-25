<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Strategy;

class BothHandsAttackStrategy implements StrategyInterface
{

    public function attack(int $power): int
    {   
        /* Critic attack from both hands */
        return mt_rand($power, $power*2);
    }

}
