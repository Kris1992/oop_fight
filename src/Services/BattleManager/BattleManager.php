<?php
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\Builder\Parts\Character;
use App\Services\BattleManager\Config\StrategyTypes;

/**
 * Take care about all battle processes 
 */
class BattleManager extends StrategyTypes implements BattleManagerInterface
{
    
    private $attackFactory;    

    public function __construct(AttackFactoryInterface $attackFactory)
    {
        $this->attackFactory = $attackFactory;
    }

    /**
     * Battle algorithm
     *
     * @return BattleResult
     */
    public function battle(Character $hero, Character $monster)
    {
        $strategyKey = array_rand(self::$attackStrategies, 1);
        $this->attackFactory->create(100, self::$attackStrategies[$strategyKey]);
        
    }

}
