<?php 
declare(strict_types=1);

namespace App\Services\BattleManager\BattleResultFactory;

use App\Entity\{BattleResult, AbstractCharacter};

class BattleResultFactory implements BattleResultFactoryInterface
{

    public function create(AbstractCharacter $firstParticipant, AbstractCharacter $secondParticipant,?AbstractCharacter $winner, ?AbstractCharacter $loser, int $toursNumber): BattleResult
    {

        $battleResult = new BattleResult();
        $battleResult->setFirstParticipant($firstParticipant);
        $battleResult->setSecondParticipant($secondParticipant);
        $battleResult->setToursNumber($toursNumber);
        $battleResult->setWinner($winner);
        $battleResult->setLoser($loser);

        return $battleResult;
    }

}
