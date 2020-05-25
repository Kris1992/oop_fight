<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Hero;
use Doctrine\Common\Persistence\ObjectManager;
use App\Services\Builder\HeroBuilder;
use App\Services\Builder\Director;

class HeroFixtures extends BaseFixture 
{

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_heros', function($i)
        {   

            $heroBuilder = new HeroBuilder($this->faker->firstName);
            $hero = (new Director())->build($heroBuilder);

            return $hero;

        });

        $manager->flush();
    }

}
