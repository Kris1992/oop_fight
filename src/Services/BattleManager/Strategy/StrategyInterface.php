<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Strategy;

interface StrategyInterface
{

    /**
     * [attack Attack method]
     * @param  int    $power Initial power of attack
     * @return int    $damage
     */
    public function attack(int $power): int;

}
