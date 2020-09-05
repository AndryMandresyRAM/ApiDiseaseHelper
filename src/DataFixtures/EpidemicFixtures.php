<?php

namespace App\DataFixtures;

use App\Entity\Epidemic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EpidemicFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 100; $i++) { 
            $epidemic = new Epidemic();
            $epidemic
                    ->setYearEpidemic(new \DateTime('now'))
                    ->setNumberRecensedCase($i*100)
                    ->setVictimNumber($i*10);
            $manager->persist($epidemic);
        }
        $manager->flush();
    }
}
