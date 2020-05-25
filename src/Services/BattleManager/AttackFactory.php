<?php 
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\BattleManager\Strategy\LeftHandAttackStrategy;
use App\Services\BattleManager\Strategy\RightHandAttackStrategy;
use App\Services\BattleManager\Strategy\BothHandsAttackStrategy;
use App\Services\Builder\Parts\Character;

class AttackFactory implements AttackFactoryInterface
{

    public function create(Character $character, string $strategyName): Attack
    {   

        $power = 0; 
        switch ($strategyName)
        {
            case 'leftHand':
                $power = $character->getLeftHand()->getPower();
                $strategy = new LeftHandAttackStrategy();
                break;
            case 'rightHand':
                $power = $character->getRightHand()->getPower();
                $strategy = new RightHandAttackStrategy();
                break;
            case 'critic':
                $power = $character->getLeftHand()->getPower() + $character->getRightHand()->getPower();
                $strategy = new BothHandsAttackStrategy();
                break;
            default:
                throw new \RuntimeException('Unknown strategy name');
        }

        return new Attack($power, $strategy);
    }

}
