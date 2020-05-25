<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\Config;

abstract class StrategyTypes
{
    
    protected static $attackStrategies = [
        'leftHand',
        'rightHand',
        'critic',
    ];

}
