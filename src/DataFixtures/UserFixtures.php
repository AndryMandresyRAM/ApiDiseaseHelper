<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $u1 = new User();
        $u1->setEmail('andrymandresyram@gmail.com');
        $u1->setRoles(['ROLE_ADMIN']);
        $u1->setPassword($this->passwordEncoder->encodePassword($u1, 'Mandresy'));
        $manager->persist($u1);
        $u2 = new User();
        $u2->setEmail('darknessmcbg@gmail.com');
        $u2->setRoles(['ROLE_ADMIN']);
        $u2->setPassword($this->passwordEncoder->encodePassword($u2, 'Mandresy'));
        $manager->persist($u2);
        $manager->flush();
    }
}
