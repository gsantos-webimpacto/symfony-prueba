<?php

namespace App\DataFixtures;

// use App\Emtity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $user = new User();
        // $user->setEmail('gsantos@web-impacto.es');
        // $user->setRoles(['ROLE_USER']);
        // $user->setPassword('guillermo');
        // $manager->persist($user);
        // $manager->flush();
    }
}
