<?php 
declare(strict_types=1);

namespace App\Services\BattleManager;

use App\Services\BattleManager\Strategy\LeftHandAttackStrategy;
use App\Services\BattleManager\Strategy\RightHandAttackStrategy;
use App\Services\BattleManager\Strategy\BothHandsAttackStrategy;

class AttackFactory implements AttackFactoryInterface
{

    public function create(int $power, string $strategyName): Attack
    {   
        switch ($strategyName)
        {
            case 'leftHand':
                $strategy = new LeftHandAttackStrategy();
                break;
            case 'rightHand':
                $strategy = new RightHandAttackStrategy();
                break;
            case 'critic':
                $strategy = new BothHandsAttackStrategy();
                break;
            default:
                throw new \RuntimeException('Unknown strategy name');
        }

        return new Attack($power, $strategy);
    }

}
