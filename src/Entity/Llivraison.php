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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuml(): ?string
    {
        return $this->numl;
    }

    public function setNuml(string $numl): self
    {
        $this->numl = $numl;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getPv(): ?string
    {
        return $this->pv;
    }

    public function setPv(string $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getQte(): ?string
    {
        return $this->qte;
    }

    public function setQte(string $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getTva(): ?string
    {
        return $this->tva;
    }

    public function setTva(string $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getLig(): ?int
    {
        return $this->lig;
    }

    public function setLig(int $lig): self
    {
        $this->lig = $lig;

        return $this;
    }


}
