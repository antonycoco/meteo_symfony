<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{

    const VLL_1 = 'ville-1';
    const VLL_2 = 'ville-2';
    const VLL_3 = 'ville-3';
    public function load(ObjectManager $manager)
    {
        $marseille = new Ville();
        $aubagne = new Ville();
        $ciotat = new Ville();
        $marseille->setNom('marseille');
        $aubagne->setNom('aubagne');
        $ciotat->setNom('ciotat');
        $manager->persist($marseille);
        $manager->persist($aubagne);
        $manager->persist($ciotat);
        $manager->flush();
        $this->addReference(self::VLL_1, $marseille);
        $this->addReference(self::VLL_2, $aubagne);
        $this->addReference(self::VLL_3, $ciotat);
    }
}
