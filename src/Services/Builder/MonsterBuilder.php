<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Accessories\Names\MonsterName;
use App\Services\Builder\Parts\Accessories\Weapons\Mace;
use App\Services\Builder\Parts\Accessories\Weapons\Fist;
use App\Services\Builder\Parts\Accessories\Armors\LeatherArmor;
use App\Services\Builder\Parts\Character;
use App\Entity\Monster;

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
        $this->monster->setName((new MonsterName($this->name))->getName());
    }

    public function addWeapon()
    {   
        $probability = mt_rand(0,2);
        switch ($probability) {
            case 1:
                $this->monster->setRightHand((new Mace())->getWeapon());
                $this->monster->setLeftHand((new Fist(12))->getWeapon());
                break;
            default:
                $this->monster->setLeftHand((new Fist(14))->getWeapon());
                $this->monster->setRightHand((new Fist(15))->getWeapon());
                break;
        } 

    }
    
    public function addHelmet()
    {

    }

    public function addArmor()
    {
        $this->monster->setBody((new LeatherArmor())->getArmor());
    }

    public function addBoots()
    {
    
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
