<?php 
declare(strict_types=1);

namespace App\Services\Builder;

//use DesignPatterns\Creational\Builder\Parts\Door;


use App\Services\Builder\Parts\Character;
use App\Services\Builder\Parts\Characters\Monster;

class MonsterBuilder implements Builder
{
    /** @var Monster $monster */
    private $monster;

    public function addWeapon()
    {
       // $this->truck->setPart('rightDoor', new Door());
        //$this->truck->setPart('leftDoor', new Door());
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
        $this->monster = new Monster();
    }

    public function getCharacter(): Character
    {
        return $this->monster;
    }
}