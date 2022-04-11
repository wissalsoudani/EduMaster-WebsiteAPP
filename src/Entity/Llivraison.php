<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Llivraison
 *
 * @ORM\Table(name="llivraison", indexes={@ORM\Index(name="produit", columns={"produit"})})
 * @ORM\Entity
 */
class Llivraison
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
     * @ORM\Column(name="numl", type="string", length=50, nullable=false)
     */
    private $numl;

    /**
     * @var string
     *
     * @ORM\Column(name="produit", type="string", length=50, nullable=false)
     */
    private $produit;

    /**
     * @var string
     *
     * @ORM\Column(name="pv", type="string", length=50, nullable=false)
     */
    private $pv;

    /**
     * @var string
     *
     * @ORM\Column(name="qte", type="string", length=50, nullable=false)
     */
    private $qte;

    /**
     * @var string
     *
     * @ORM\Column(name="tva", type="string", length=50, nullable=false)
     */
    private $tva;

    /**
     * @var int
     *
     * @ORM\Column(name="lig", type="integer", nullable=false)
     */
    private $lig;


}
