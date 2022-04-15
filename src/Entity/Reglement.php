<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reglement
 *
 * @ORM\Table(name="reglement", indexes={@ORM\Index(name="IDX_EBE4C14C19EB6921", columns={"client_id"}), @ORM\Index(name="IDX_EBE4C14C7F2DEE08", columns={"facture_id"})})
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

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \Facture
     *
     * @ORM\ManyToOne(targetEntity="Facture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="facture_id", referencedColumnName="id")
     * })
     */
    private $facture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModereg(): ?string
    {
        return $this->modereg;
    }

    public function setModereg(string $modereg): self
    {
        $this->modereg = $modereg;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNumpiece(): ?string
    {
        return $this->numpiece;
    }

    public function setNumpiece(string $numpiece): self
    {
        $this->numpiece = $numpiece;

        return $this;
    }

    public function getEcheance(): ?string
    {
        return $this->echeance;
    }

    public function setEcheance(string $echeance): self
    {
        $this->echeance = $echeance;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }


}
