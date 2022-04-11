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


}
