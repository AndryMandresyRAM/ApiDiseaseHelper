<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 100; $i++) { 
            $country = new Country();
            $country
                ->setName('Country '.$i)
                ->setPopulationNumber($i*1005)
                ->setPib($i*42);
            $manager->persist($country);
        }
        $manager->flush();
    }
}
