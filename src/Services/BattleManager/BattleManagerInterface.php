<?php
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Entity\{AbstractCharacter, BattleResult};

/**
 * Take care about all battle processes 
 */
interface BattleManagerInterface
{
    /**
     * [battle Take care about battle process and return BattleResult object]
     * @param  AbstractCharacter $hero    Hero object
     * @param  AbstractCharacter $monster Monster object
     * @return BattleResult
     */
    public function battle(AbstractCharacter $hero, AbstractCharacter $monster): BattleResult;

}
