<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Accessories\Weapons\ColdSteel;
use App\Services\Builder\Parts\Accessories\Weapons\Firearm;
use App\Services\Builder\Parts\Character;

use App\Services\Builder\Parts\Characters\Hero;

class HeroBuilder implements Builder
{
    /** @var Hero $hero */
    private $hero;

    public function addWeapon()
    {   
        $probability = mt_rand(0,3);
        switch ($probability) {
            case 1:
                $this->hero->setPart('rightHand', new ColdSteel('Sword', 10));
                break;
            case 2:
                $this->hero->setPart('rightHand', new Firearm('Colt', 30));
                $this->hero->setPart('leftHand', new Firearm('Colt', 20));
            default:
                //Unlucky man without weapon
                break;
        } 
    }
    
    public function addHelmet()
    {

    }

    public function addArmor()
    {

    }

    public function addBoots()
    {

    }

    public function createCharacter()
    {
        $this->hero = new Hero();
    }

    public function getCharacter(): Character
    {
        return $this->hero;
    }
}