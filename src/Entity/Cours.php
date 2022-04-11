<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cours", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCours;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cours", type="string", length=30, nullable=false)
     */
    private $nomCours;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_cours", type="string", length=150, nullable=false)
     */
    private $contenuCours;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_pages", type="integer", nullable=false)
     */
    private $nbPages;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_chapitres", type="integer", nullable=false)
     */
    private $nbChapitres;


}
