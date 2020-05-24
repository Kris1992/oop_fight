<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Armors;

use App\Services\Builder\Parts\Accessories\Modifiers\LuckyFactorTrait;

class LeatherArmor extends AbstractArmor
{

    use LuckyFactorTrait;

    private $baseName = 'Leather';
    
    private $baseShield = 200;

    public function __construct()
    {   
        $this->modifyLeather();
        parent::__construct($this->baseName, $this->baseShield);
    }

    /**
     * [modifyLeather Modify Leather of character]
     */
    private function modifyLeather()
    {
        $this->randomizeLucky();
        if ($this->isLucky) {
            $this->baseName = sprintf('%s %s', 'Hard', $this->baseName);
            $this->baseShield = $this->baseShield*3;
        }
    }

}
