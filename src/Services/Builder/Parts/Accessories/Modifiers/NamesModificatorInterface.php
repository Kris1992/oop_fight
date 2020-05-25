<?php 
declare(strict_types=1);

namespace App\Services\Builder\Parts\Accessories\Modifiers;

interface NamesModificatorInterface
{   

    /**
     * [modifyName Make name modification by character class]
     * @param  string $name [Base name of character]
     * @return string       [Modified name]
     */
    public function modifyName(string $name): string;

}
