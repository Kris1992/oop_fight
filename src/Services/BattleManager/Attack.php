<?php 
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\BattleManager\Strategy\StrategyInterface;

class Attack 
{
    private $power;

    private $attackStrategy;
    
    /**
     * [__construct Create Attack]
     * @param int    $power        Initial value of power 
     * @param StrategyInterface $attackStrategy Choosen strategy
     */
    public function __construct(int $power, StrategyInterface $attackStrategy)
    {
        $this->power = $power;
        $this->attackStrategy = $attackStrategy;
    }

    /**
     * [getTotalDamage Get total damage of attack]
     * @return int
     */
    public function getTotalDamage(): int
    {   
        return  $this->attackStrategy->attack($this->power);
    }

}
