<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Accessories\Weapons\{ColdSteel, Firearm, Fist};
use App\Services\Builder\Parts\Accessories\Helmets\{FullFaceHelmet, OpenFaceHelmet, Helmet};
use App\Services\Builder\Parts\Accessories\Armors\{GoldArmor, SteelArmor, GambesonArmor};
use App\Services\Builder\Parts\Accessories\Boots\{ArmoredBoots, Boots};
use App\Services\Builder\Parts\Accessories\Names\HumanName;
use App\Entity\{AbstractCharacter, Hero};

class HeroBuilder implements BuilderInterface
{
    /** @var Hero $hero */
    private $hero;

    /** @var string $name */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addName()
    {
        $this->hero->setName((new HumanName($this->name))->getName());
    }

    public function addHealth()
    {
        $this->hero->setHealth(mt_rand(300, 500));
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
        $this->hero->setType('Hero');
    }

    public function getCharacter(): AbstractCharacter
    {
        return $this->hero;
    }
    
}