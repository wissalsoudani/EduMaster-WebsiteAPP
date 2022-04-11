<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="famille", columns={"famille"})})
 * @ORM\Entity
 */
class Produit
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
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var float
     *
     * @ORM\Column(name="pa", type="float", precision=10, scale=0, nullable=false)
     */
    private $pa;

    /**
     * @var float
     *
     * @ORM\Column(name="pv", type="float", precision=10, scale=0, nullable=false)
     */
    private $pv;

    /**
     * @var int
     *
     * @ORM\Column(name="tva", type="integer", nullable=false)
     */
    private $tva;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", length=0, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=50, nullable=false)
     */
    private $famille;


}
