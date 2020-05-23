<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Hero;
use Doctrine\Common\Persistence\ObjectManager;

class HeroFixtures extends BaseFixture 
{

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_heros', function($i)
        {
            $hero = new Hero();
            $hero
                ->setName($this->faker->firstName)
                ;

            return $hero;
        });

        $manager->flush();
    }

}
