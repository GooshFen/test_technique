<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Student;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        
        for($i = 0; $i < 15; $i++) {
            $student = new Student();
            $student->setName($faker->firstName());
            $student->setIsPresent(false);
            $manager->persist($student);
        }
            $manager->flush();
        
    }
}
