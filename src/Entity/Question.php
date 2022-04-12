<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="id_quizs", columns={"id_quizs"})})
 * @ORM\Entity
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_question", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=30, nullable=false)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="matiere", type="string", length=30, nullable=false)
     */
    private $matiere;

    /**
     * @var string
     *
     * @ORM\Column(name="R1", type="string", length=30, nullable=false)
     */
    private $r1;

    /**
     * @var string
     *
     * @ORM\Column(name="R2", type="string", length=30, nullable=false)
     */
    private $r2;

    /**
     * @var string
     *
     * @ORM\Column(name="R3", type="string", length=30, nullable=false)
     */
    private $r3;

    /**
     * @var string
     *
     * @ORM\Column(name="solution", type="string", length=30, nullable=false)
     */
    private $solution;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulte", type="string", length=30, nullable=false)
     */
    private $difficulte;

    /**
     * @var \Quizs
     *
     * @ORM\ManyToOne(targetEntity="Quizs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_quizs", referencedColumnName="id_quizs")
     * })
     */
    private $idQuizs;

    public function getIdQuestion(): ?int
    {
        return $this->idQuestion;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getR1(): ?string
    {
        return $this->r1;
    }

    public function setR1(string $r1): self
    {
        $this->r1 = $r1;

        return $this;
    }

    public function getR2(): ?string
    {
        return $this->r2;
    }

    public function setR2(string $r2): self
    {
        $this->r2 = $r2;

        return $this;
    }

    public function getR3(): ?string
    {
        return $this->r3;
    }

    public function setR3(string $r3): self
    {
        $this->r3 = $r3;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->solution;
    }

    public function setSolution(string $solution): self
    {
        $this->solution = $solution;

        return $this;
    }

    public function getDifficulte(): ?string
    {
        return $this->difficulte;
    }

    public function setDifficulte(string $difficulte): self
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    public function getIdQuizs(): ?Quizs
    {
        return $this->idQuizs;
    }

    public function setIdQuizs(?Quizs $idQuizs): self
    {
        $this->idQuizs = $idQuizs;

        return $this;
    }


}
