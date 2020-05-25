<?php
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Modifiers;

trait LuckyFactorTrait
{   

    /** @var int [lucky modifier to weapon(0 or 1)] */
    private $isLucky;

    private function randomizeLucky()
    {
        $this->isLucky = mt_rand(0,1);
    }

}
