<?php

namespace App\DataFixtures;

use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubjectFixtures extends Fixture 
{

    public const MATHEMATIQUE = "mathématique";
    public const FRANCAIS = "français";
    public const PHYSIQUE_CHIMIE = "Physique/Chimie";


    public function load(ObjectManager $manager): void
    {

        $subject = new Subject ;
        $subject->setName('Mathématique');
        $this->addReference(self::MATHEMATIQUE, $subject);
        $manager->persist($subject);

        $subject1 = new Subject ;
        $subject1->setName('Français');
        $this->addReference(self::FRANCAIS, $subject1);
        $manager->persist($subject1);

       
        $subject2 = new Subject ;
        $subject2->setName('Physique/Chimie');
        $this->addReference(self::PHYSIQUE_CHIMIE, $subject2);
        $manager->persist($subject2);

        $manager->flush();
    }
}
