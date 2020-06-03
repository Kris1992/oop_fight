<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\BattleResultFactory;

use App\Entity\{BattleResult, AbstractCharacter};

interface BattleResultFactoryInterface
{
    /**
     * [create Create Battle result]
     * @param  AbstractCharacter $firstParticipant  First participant of battle
     * @param  AbstractCharacter $secondParticipant Second participant of battle
     * @param  AbstractCharacter|null $winner       Winner or null if it is draw
     * @param  AbstractCharacter|null $loser        Loser or null if it is draw
     * @param  int               $toursNumber       Number of tours
     * @return BattleResult
     */
    public function create(AbstractCharacter $firstParticipant, AbstractCharacter $secondParticipant,?AbstractCharacter $winner, ?AbstractCharacter $loser, int $toursNumber): BattleResult;

}
