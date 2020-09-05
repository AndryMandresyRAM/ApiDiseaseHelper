<?php

namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DoctorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 100; $i++) { 
            $doctor = new Doctor();
            $doctor
                    ->setName('Name = '.$i)
                    ->setFirstName('First Name = '.$i)
                    ->setAddress('Address = '.$i)
                    ->setNumber(''.$i)
                    ->setType('1')
                    ->setEmail('test'.$i.'@gmail.com');
            $manager->persist($doctor);
        }
        $manager->flush();
    }
}
