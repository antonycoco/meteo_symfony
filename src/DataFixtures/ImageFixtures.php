<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    const IMG_1 = 'img-1';
    const IMG_2 = 'img-2';
    const IMG_3 = 'img-3';
    public function load(ObjectManager $manager)
    {
        $imageSoleil = new Image();
        $imageSoleil->setUrl('..\images\soleil.jpg')
                    ->setAlt('il fait beau');
        $manager->persist($imageSoleil);

        $imagePluie = new Image();
        $imagePluie->setUrl('..\public\images\pluie.png')
                    ->setAlt('en reste a la maison aujourdhui');
        $manager->persist($imagePluie);

        $imageNeige = new Image();
         $imageNeige->setUrl('..\infoMeteo\public\images\neige.png')
                    ->setAlt('cest la neige en reste a la maison aujourdhui ');
        $manager->persist($imageNeige);

        $manager->flush();

        $this->addReference(self::IMG_1, $imageSoleil);
        $this->addReference(self::IMG_2, $imagePluie);
        $this->addReference(self::IMG_3, $imageNeige);
    }
}
