<?php 
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\BattleManager\Strategy\StrategyInterface;
use App\Services\Builder\Parts\Character;

interface AttackFactoryInterface
{
    /**
     * [create Create Attack object]
     * @param  Character    $character    Character object
     * @param  string $strategyName String with strategy name
     * @return Attack
     */
    public function create(Character $character, string $strategyName): Attack;

}
