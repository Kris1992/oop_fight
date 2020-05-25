<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Entity\Character;

class Director
{
    
    public function build(BuilderInterface $builder): Character
    {
        $builder->createCharacter();
        $builder->addName();
        $builder->addHealth();
        $builder->addWeapon();
        $builder->addHelmet();
        $builder->addArmor();
        $builder->addBoots();

        return $builder->getCharacter();
    }

}
