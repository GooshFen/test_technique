<?php
// api/src/Controller/CreateBookPublication.php

namespace App\Controller;

use App\Entity\Lesson;
use App\Repository\LessonRepository;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[AsController]
class LessonController extends AbstractController
{
    private $lessons;
    private $test;
    public function __construct(LessonRepository $lessonRepository, SerializerInterface $serializer)
    {
        $this->lessons = $lessonRepository->findBy(['subject' => 4]);
    }

    public function __invoke(Lesson $data): Lesson
    {
        foreach($this->lessons as $lesson) {
            $data = $lesson;
        }
        return $data;
    }
}
