<?php 
declare(strict_types=1);

namespace App\Services\Builder;

use App\Services\Builder\Parts\Accessories\Weapons\ColdSteel;
use App\Services\Builder\Parts\Accessories\Weapons\Firearm;
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
use App\Services\Builder\Parts\Characters\Hero;

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
        $this->hero->setPart('name', new HumanName($this->name));
    }

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

        $probability = mt_rand(0,3);
        switch ($probability) {
            case 1:
                $this->hero->setPart('head', new FullFaceHelmet());
                break;
            case 2:
                $this->hero->setPart('head', new OpenFaceHelmet());
            default:
                $this->hero->setPart('head', new Helmet('Cap', 5));
                break;
        }

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
        $this->hero = new Hero();
    }

    public function getCharacter(): Character
    {
        return $this->hero;
    }
}