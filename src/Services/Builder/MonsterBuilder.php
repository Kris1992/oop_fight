<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Accessories\Names\HumanName;


use App\Services\Builder\Parts\Character;
use App\Services\Builder\Parts\Characters\Monster;

class MonsterBuilder implements Builder
{
    /** @var Monster $monster */
    private $monster;

    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addName()
    {
        $this->hero->setPart('name', new HumanName($this->name));
    }

    public function addWeapon()
    {   
        $probability = mt_rand(0,3);
        switch ($probability) {
            case 1:
                $this->hero->setPart('rightHand', new Mace(12));
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
        $probability = mt_rand(0,3);
        switch ($probability) {
            case 1:
                $this->hero->setPart('body', new GoldArmor());
                break;
            case 2:
                $this->hero->setPart('body', new SteelArmor());
            default:
                $this->hero->setPart('body', new GambesonArmor());
                break;
        } 
    }

    public function addBoots()
    {
        $probability = mt_rand(0,1);
        switch ($probability) {
            case 0:
                $this->hero->setPart('legs', new ArmoredBoots());
                break;
            default:
                $this->hero->setPart('body', new Boots());
                break;
        } 
    }

    public function createCharacter()
    {
        $this->monster = new Monster();
    }

    public function getCharacter(): Character
    {
        return $this->monster;
    }
}