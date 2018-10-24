<?php

namespace App\DataFixtures;

use App\Entity\Climat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ClimatFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $product = new Product();
         $manager->persist($product);
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

    }
    public function getDependencies() {
        return array(
           ImageFixtures::class

        );
    }
}
