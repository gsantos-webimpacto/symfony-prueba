<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('gsantos@web-impacto.es');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$STdSdEhjYWp5M1BsTUdPTg$c5S6BGv/sdbTuCAA13IIpev8k3LnbBB6smOmsiFOhF4');
        $manager->persist($user);
        $manager->flush();
    }
}
