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
     * @param float    $power        Initial value of power 
     * @param StrategyInterface $attackStrategy Choosen strategy
     */
    public function __construct(float $power, StrategyInterface $attackStrategy)
    {
        $this->power = $power;
        $this->attackStrategy = $attackStrategy;
    }

    /**
     * [getTotalDamage Get total damage of attack]
     * @return float
     */
    public function getTotalDamage(): float
    {   
        return  $this->attackStrategy->attack($this->power);
    }

}
