<?php
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\Builder\Parts\Character;
use App\Entity\BattleResult;

/**
 * Take care about all battle processes 
 */
interface BattleManagerInterface
{
    
    public function battle(Character $hero, Character $monster): BattleResult;

}
