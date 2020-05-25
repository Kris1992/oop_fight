<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Monster;
use Doctrine\Common\Persistence\ObjectManager;
use App\Services\Builder\MonsterBuilder;
use App\Services\Builder\Director;

class MonsterFixtures extends BaseFixture 
{

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_monsters', function($i)
        {
            $monsterBuilder = new MonsterBuilder($this->faker->firstName);
            $monster = (new Director())->build($monsterBuilder);

            return $monster;
            
        });

        $manager->flush();
    }

}
