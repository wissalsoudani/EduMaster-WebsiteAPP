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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getFacture(): ?string
    {
        return $this->facture;
    }

    public function setFacture(string $facture): self
    {
        $this->facture = $facture;

        return $this;
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


}
