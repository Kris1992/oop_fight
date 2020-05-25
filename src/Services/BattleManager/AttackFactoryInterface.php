<?php 
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\BattleManager\Strategy\StrategyInterface;

interface AttackFactoryInterface
{
    /**
     * [create Create Attack object]
     * @param  int    $power        Initial power 
     * @param  string $strategyName String with strategy name
     * @return Attack
     */
    public function create(int $power, string $strategyName): Attack;

}
