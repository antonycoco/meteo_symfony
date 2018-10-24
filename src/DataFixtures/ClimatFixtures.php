<?php

namespace App\DataFixtures;

use App\Entity\Climat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ClimatFixtures extends Fixture implements DependentFixtureInterface
{
    const Clim_1 = 'clim-1';
    const Clim_2 = 'clim-2';
    const Clim_3 = 'clim-3';
    public function load(ObjectManager $manager)
    {

        $soleil = new Climat();
        $pluie = new Climat();
        $neige = new Climat();
        $soleil->setEtat('soleil')
                ->setImage($this->getReference(ImageFixtures::IMG_1));
        $pluie->setEtat('pluie')
            ->setImage($this->getReference(ImageFixtures::IMG_2));
        $neige->setEtat('neige')
            ->setImage($this->getReference(ImageFixtures::IMG_3));
        $manager->persist($soleil);
        $manager->persist($pluie);
        $manager->persist($neige);
        $manager->flush();
        $this->addReference(self::Clim_1, $soleil);
        $this->addReference(self::Clim_2, $pluie);
        $this->addReference(self::Clim_3, $neige);
    }
    public function getDependencies() {
        return array(
           ImageFixtures::class

        );
    }
}
