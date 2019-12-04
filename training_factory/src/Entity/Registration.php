<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistrationRepository")
 */
class Registration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $payment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\person", inversedBy="lesson")
     */
    private $Member;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lesson", inversedBy="registrations")
     */
    private $lesson;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayment(): ?bool
    {
        return $this->payment;
    }

    public function setPayment(?bool $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getMember(): ?person
    {
        return $this->Member;
    }

    public function setMember(?person $Member): self
    {
        $this->Member = $Member;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    public function setLesson(?Lesson $lesson): self
    {
        $this->lesson = $lesson;

        return $this;
    }
}
