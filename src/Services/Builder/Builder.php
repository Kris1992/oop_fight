<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Character;

interface Builder
{
    public function createCharacter();

    public function addWeapon();

    public function addHelmet();

    public function addArmor();

    public function addBoots();

    public function getCharacter(): Character;
}