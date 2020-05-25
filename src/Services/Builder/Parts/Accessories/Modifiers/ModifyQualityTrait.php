<?php
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Modifiers;

trait ModifyQualityTrait
{   

    use LuckyFactorTrait;

    /**
     * [modifyQuality Modify quality of Armor]
     * @param  string  $basename    Base name
     * @param  int     $baseShield  Base shield
     * @param  int     $bonus       Bonus to shield
     * @return Array                Array with modified values
     */
    private function modifyQuality(string $baseName, int $baseShield, int $bonus): Array
    {
        $this->randomizeLucky();
        if ($this->isLucky) {
            $baseName = sprintf('Upgraded %s', $baseName);
            $baseShield += 40;
        }

        return [
            'name' => $baseName,
            'shield' => $baseShield
            ];
            
    }

}
