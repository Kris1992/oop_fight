<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Strategy;

class BothHandsAttackStrategy implements StrategyInterface
{

    public function attack(float $power): float
    {   
        /* Critic attack from both hands */
        return floatval(mt_rand(intval($power), intval($power)*2));
    }

}
