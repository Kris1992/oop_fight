<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Accessories\Weapons\ColdSteel;
use App\Services\Builder\Parts\Accessories\Weapons\Firearm;
use App\Services\Builder\Parts\Accessories\Weapons\Fist;
use App\Services\Builder\Parts\Accessories\Helmets\FullFaceHelmet;
use App\Services\Builder\Parts\Accessories\Helmets\OpenFaceHelmet;
use App\Services\Builder\Parts\Accessories\Helmets\Helmet;
use App\Services\Builder\Parts\Accessories\Armors\GoldArmor;
use App\Services\Builder\Parts\Accessories\Armors\SteelArmor;
use App\Services\Builder\Parts\Accessories\Armors\GambesonArmor;
use App\Services\Builder\Parts\Accessories\Boots\ArmoredBoots;
use App\Services\Builder\Parts\Accessories\Boots\Boots;
use App\Services\Builder\Parts\Accessories\Names\HumanName;
use App\Services\Builder\Parts\Character;
use App\Entity\Hero;

class HeroBuilder implements Builder
{
    /** @var Hero $hero */
    private $hero;

    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addName()
    {
        $this->hero->setName((new HumanName($this->name))->getName());
    }

    public function addWeapon()
    {   
        
        $probability = mt_rand(0,3);
        switch ($probability) {
            case 1:
                $this->hero->setRightHand((new ColdSteel('Sword', 10))->getWeapon());
                $this->hero->setLeftHand((new Fist())->getWeapon());
                break;
            case 2:
                $this->hero->setRightHand((new Firearm('Colt', 30))->getWeapon());
                $this->hero->setLeftHand((new Firearm('Colt', 20))->getWeapon());
            default:
                //Unlucky man without weapon
                $this->hero->setLeftHand((new Fist())->getWeapon());
                $this->hero->setRightHand((new Fist())->getWeapon());
                break;
        }

    }
    
    public function addHelmet()
    {
        
        $probability = mt_rand(0,3);
        switch ($probability) {
            case 1:
                $this->hero->setHead((new FullFaceHelmet())->getHelmet());
                break;
            case 2:
                $this->hero->setHead((new OpenFaceHelmet())->getHelmet());
            default:
                $this->hero->setHead((new Helmet('Cap', 5))->getHelmet());
                break;
        }

    }

    public function addArmor()
    {
        
        $probability = mt_rand(0,3);
        switch ($probability) {
            case 1:
                $this->hero->setBody((new GoldArmor())->getArmor());
                break;
            case 2:
                $this->hero->setBody((new SteelArmor())->getArmor());
            default:
                $this->hero->setBody((new GambesonArmor())->getArmor());
                break;
        }

    }

    public function addBoots()
    {
        
        $probability = mt_rand(0,1);
        switch ($probability) {
            case 0:
                $this->hero->setFoots((new ArmoredBoots())->getBoots());
                break;
            default:
                $this->hero->setFoots((new Boots())->getBoots());
                break;
        }
        
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