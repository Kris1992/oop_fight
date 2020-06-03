<?php
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Entity\{AbstractCharacter, BattleResult};
use App\Services\BattleManager\Config\StrategyTypes;
use App\Services\BattleManager\BattleResultFactory\BattleResultFactoryInterface;

/**
 * Take care about all battle processes 
 */
class BattleManager extends StrategyTypes implements BattleManagerInterface
{
    
    private $attackFactory;

    private $battleResultFactory;    

    public function __construct(AttackFactoryInterface $attackFactory, BattleResultFactoryInterface $battleResultFactory)
    {
        $this->attackFactory = $attackFactory;
        $this->battleResultFactory = $battleResultFactory;
    }

    /**
     * Battle algorithm
     *
     * @return BattleResult
     */
    public function battle(AbstractCharacter $hero, AbstractCharacter $monster): BattleResult
    {

        $heroHealth = $hero->getHealth();
        $monsterHealth = $monster->getHealth();

        $index = 0; 
        while ($heroHealth > 0 && $monsterHealth > 0) {

            $heroHealth -= $this->getTotalDamage($monster);
            $monsterHealth -= $this->getTotalDamage($hero);
            $index++;
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

        return $this->battleResultFactory->create($hero, $monster, $winner, $loser, $index);
    }

    /**
     * [getTotalDamage Get total damage depends of strategy and character]
     * @param  AbstractCharacter $character Character object
     * @return float 
     */
    private function getTotalDamage(AbstractCharacter $character): float 
    {

        $strategyKey = array_rand(self::$attackStrategies, 1);
        $attack = $this->attackFactory->create($character, self::$attackStrategies[$strategyKey]);
        return $attack->getTotalDamage();

    }

}
