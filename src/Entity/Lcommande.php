<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lcommande
 *
 * @ORM\Table(name="lcommande")
 * @ORM\Entity
 */
class Lcommande
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
     * @ORM\Column(name="Numc", type="string", length=50, nullable=false)
     */
    private $numc;

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
     * @var string
     *
     * @ORM\Column(name="lig", type="string", length=50, nullable=false)
     */
    private $lig;


}
