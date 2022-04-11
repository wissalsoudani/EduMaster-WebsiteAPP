<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compteur
 *
 * @ORM\Table(name="compteur")
 * @ORM\Entity
 */
class Compteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numcom", type="integer", nullable=false)
     */
    private $numcom;

    /**
     * @var string
     *
     * @ORM\Column(name="numl", type="string", length=50, nullable=false)
     */
    private $numl;


}
