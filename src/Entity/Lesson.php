<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LessonRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\LessonController;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
#[ApiResource( 
    itemOperations: [
    'get' => [
        'method' => 'GET',
        'path' => '/subject_lesson/{id}',
        'controller' => LessonController::class,
    ],
])
]
class Lesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToMany(targetEntity: Professor::class, mappedBy: 'lessons')]
    private Collection $professors;

    #[ORM\Column]
    private ?bool $isChecked = null;

    #[ORM\ManyToMany(targetEntity: Student::class, inversedBy: 'lessons', cascade:['persist'])]
    private Collection $students;

    #[ORM\ManyToOne(inversedBy: 'lessons')]
    private ?Subject $subject = null;

    

    public function __construct()
    {
        $this->professors = new ArrayCollection();
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Professor>
     */
    public function getProfessors(): Collection
    {
        return $this->professors;
    }

    public function addProfessor(Professor $professor): self
    {
        if (!$this->professors->contains($professor)) {
            $this->professors->add($professor);
            $professor->addLesson($this);
        }

        return $this;
    }

    public function removeProfessor(Professor $professor): self
    {
        if ($this->professors->removeElement($professor)) {
            $professor->removeLesson($this);
        }

        return $this;
    }

    public function isIsChecked(): ?bool
    {
        return $this->isChecked;
    }

    public function setIsChecked(bool $isChecked): self
    {
        $this->isChecked = $isChecked;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        $this->students->removeElement($student);

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

}
