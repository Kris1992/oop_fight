<?php
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\Builder\Parts\Character;
use App\Services\BattleManager\Config\StrategyTypes;
use App\Entity\BattleResult;

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
    public function battle(Character $hero, Character $monster): BattleResult
    {

        $heroHealth = $hero->getHealth();
        $monsterHealth = $monster->getHealth();

        $index = 0; 
        while ($heroHealth > 0 && $monsterHealth > 0) {

            $heroHealth -= $this->getTotalDamage($monster);
            $monsterHealth -= $this->getTotalDamage($hero);
            $index;
        }

        if ($heroHealth <= 0 && $monsterHealth <= 0) {
            $winner = null;
            $loser = null;
        } elseif ($heroHealth <= 0) {
            $winner = $monster;
            $loser = $hero;
        } else {
            $winner = $hero;
            $loser = $monster;
        }

        return new BattleResult($winner, $loser, $index);

    }

    /**
     * [getTotalDamage Get total damage depends of strategy and character]
     * @param  Character $character Character object
     * @return float 
     */
    private function getTotalDamage(Character $character): float 
    {

        $strategyKey = array_rand(self::$attackStrategies, 1);
        $attack = $this->attackFactory->create($character, self::$attackStrategies[$strategyKey]);
        return $attack->getTotalDamage();

    }

}
