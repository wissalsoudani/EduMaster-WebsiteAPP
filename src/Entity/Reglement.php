<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reglement
 *
 * @ORM\Table(name="reglement", indexes={@ORM\Index(name="client", columns={"client"})})
 * @ORM\Entity
 */
class Reglement
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
     * @var string
     *
     * @ORM\Column(name="client", type="string", length=50, nullable=false)
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="facture", type="string", length=50, nullable=false)
     */
    private $facture;

    /**
     * @var string
     *
     * @ORM\Column(name="modereg", type="string", length=50, nullable=false)
     */
    private $modereg;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="string", length=50, nullable=false)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="numpiece", type="string", length=50, nullable=false)
     */
    private $numpiece;

    /**
     * @var string
     *
     * @ORM\Column(name="echeance", type="string", length=50, nullable=false)
     */
    private $echeance;


}
