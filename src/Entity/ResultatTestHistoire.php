<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultatTestHistoire
 *
 * @ORM\Table(name="resultat_test_histoire", indexes={@ORM\Index(name="fk_idtest", columns={"id_test"})})
 * @ORM\Entity
 */
class ResultatTestHistoire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_resultat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResultat;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", nullable=false)
     */
    private $score;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="ligne_histoire", type="integer", nullable=false, options={"default"="-1"})
     */
    private $ligneHistoire = -1;

    /**
     * @var \TestHistoire
     *
     * @ORM\ManyToOne(targetEntity="TestHistoire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_test", referencedColumnName="id_test")
     * })
     */
    private $idTest;


}
