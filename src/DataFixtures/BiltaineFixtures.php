<?php

namespace App\DataFixtures;

use App\Entity\Billtain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BiltaineFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
       $Biltaine = new Billtain();
        $Biltaine->setVille()
                 ->setClimat()
                 ->setTempirature()
                 ->setDescription()
                 ->setDate()
        ;

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {

    }
}
