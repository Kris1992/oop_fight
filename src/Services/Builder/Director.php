<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Character;

class Director
{
    
    public function build(Builder $builder): Character
    {
        $builder->createCharacter();
        $builder->addName();
        $builder->addWeapon();
        $builder->addHelmet();
        $builder->addArmor();
        $builder->addBoots();

        return $builder->getCharacter();
    }

}
