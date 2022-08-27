<?php

namespace App\DataFixtures;

use App\Entity\Lesson;
use App\Entity\Student;
use App\Repository\StudentRepository;
use App\Repository\SubjectRepository;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LessonFixtures extends Fixture implements DependentFixtureInterface
{
    private $students;
    public function __construct(StudentRepository $studentRepository)
    {
        $this->students = $studentRepository->findAll();
    }

    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 5; $i++) {
            $lesson = new Lesson ;
            $lesson->setName('Cours de mathématique');
            $lesson->setDate(new DateTimeImmutable());
            $lesson->setIsChecked('false');
            $lesson->setSubject($this->getReference(SubjectFixtures::MATHEMATIQUE));
            foreach ($this->students as $student) {
                $lesson->addStudent($student); 
                $manager->persist($lesson);  

            }

        }

        for($i = 0; $i < 5; $i++) {
            $lesson = new Lesson ;
            $lesson->setName('Cours de français');
            $lesson->setDate(new DateTimeImmutable());
            $lesson->setIsChecked('false');
            $lesson->setSubject($this->getReference(SubjectFixtures::FRANCAIS));
            foreach ($this->students as $student) {
                $lesson->addStudent($student); 
                $manager->persist($lesson);  

            }
        }    

        for($i = 0; $i < 5; $i++) {
            $lesson = new Lesson ;
            $lesson->setName('Cours de physique-chimie');
            $lesson->setDate(new DateTimeImmutable());
            $lesson->setIsChecked('false');
            $lesson->setSubject($this->getReference(SubjectFixtures::PHYSIQUE_CHIMIE));
            foreach ($this->students as $student) {
                $lesson->addStudent($student); 
                $manager->persist($lesson);  

            }


        }    
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SubjectFixtures::class,
        ];
    }

}
