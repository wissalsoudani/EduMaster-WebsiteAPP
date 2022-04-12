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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumc(): ?string
    {
        return $this->numc;
    }

    public function setNumc(string $numc): self
    {
        $this->numc = $numc;

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

    public function getLig(): ?string
    {
        return $this->lig;
    }

    public function setLig(string $lig): self
    {
        $this->lig = $lig;

        return $this;
    }


}
