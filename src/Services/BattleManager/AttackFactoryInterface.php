<?php 
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\BattleManager\Strategy\StrategyInterface;
use App\Entity\AbstractCharacter;

interface AttackFactoryInterface
{
    /**
     * [create Create Attack object]
     * @param  AbstractCharacter    $character    Character object
     * @param  string $strategyName               String with strategy name
     * @return Attack
     */
    public function create(AbstractCharacter $character, string $strategyName): Attack;

}
