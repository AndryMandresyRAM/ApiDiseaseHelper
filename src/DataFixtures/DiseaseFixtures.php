<?php

namespace App\DataFixtures;

use App\Entity\Disease;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DiseaseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 100; $i++) { 
            $disease = new Disease();
            $disease
                    ->setScientificName("ScientificName = ".$i)
                    ->setPropagation("Propagation = ".$i)
                    ->setTreatements("Traitements = ".$i)
                    ->setSymptoms("Symptôme = ".$i)
                    ->setType(1)
                    ->setYearDiscovery(new \DateTime('now'));
            $manager->persist($disease);
        }


        $manager->flush();
    }
}
