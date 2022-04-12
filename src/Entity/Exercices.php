<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exercices
 *
 * @ORM\Table(name="exercices")
 * @ORM\Entity
 */
class Exercices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_exercices", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExercices;

    public function getIdExercices(): ?int
    {
        return $this->idExercices;
    }


}
