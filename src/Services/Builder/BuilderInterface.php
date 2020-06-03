<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Entity\AbstractCharacter;

interface BuilderInterface
{
    public function createCharacter();
    
    public function addName();

    public function addWeapon();

    public function addHelmet();

    public function addArmor();

    public function addBoots();

    public function getCharacter(): AbstractCharacter;

}
