<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quizs
 *
 * @ORM\Table(name="quizs")
 * @ORM\Entity
 */
class Quizs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_quizs", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuizs;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="matiere", type="string", length=30, nullable=false)
     */
    private $matiere;

    /**
     * @var string
     *
     * @ORM\Column(name="difficulte", type="string", length=30, nullable=false)
     */
    private $difficulte;

    /**
     * @var int
     *
     * @ORM\Column(name="resultat", type="integer", nullable=false)
     */
    private $resultat;


}
