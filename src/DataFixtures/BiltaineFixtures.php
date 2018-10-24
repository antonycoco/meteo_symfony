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
       $Biltaine1 = new Billtain();

        $Biltaine1->setVille($this->getReference(VilleFixtures::VLL_1))
                 ->setClimat($this->getReference(ClimatFixtures::Clim_1))
                 ->setTempirature(29)
                 ->setDescription('il fait chaud')
        ;
        $Biltaine2 = new Billtain();
        $Biltaine2->setVille($this->getReference(VilleFixtures::VLL_2))
            ->setClimat($this->getReference(ClimatFixtures::Clim_2))
            ->setTempirature(15)
            ->setDescription('il a la pluie')
        ;
        $Biltaine3 = new Billtain();
        $Biltaine3->setVille($this->getReference(VilleFixtures::VLL_3))
            ->setClimat($this->getReference(ClimatFixtures::Clim_3))
            ->setTempirature(-5)
            ->setDescription('il a la neige')
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
        return array(
            VilleFixtures::class,
            ClimatFixtures::class,

        );
    }
}
