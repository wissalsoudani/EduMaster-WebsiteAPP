<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity
 */
class Commande
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
     * @ORM\Column(name="client", type="string", length=50, nullable=false)
     */
    private $client;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecomm", type="date", nullable=false)
     */
    private $datecomm;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=50, nullable=false)
     */
    private $observation;

    /**
     * @var string
     *
     * @ORM\Column(name="totht", type="string", length=50, nullable=false)
     */
    private $totht;

    /**
     * @var string
     *
     * @ORM\Column(name="tottva", type="string", length=50, nullable=false)
     */
    private $tottva;

    /**
     * @var string
     *
     * @ORM\Column(name="totttc", type="string", length=50, nullable=false)
     */
    private $totttc;

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

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDatecomm(): ?\DateTimeInterface
    {
        return $this->datecomm;
    }

    public function setDatecomm(\DateTimeInterface $datecomm): self
    {
        $this->datecomm = $datecomm;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getTotht(): ?string
    {
        return $this->totht;
    }

    public function setTotht(string $totht): self
    {
        $this->totht = $totht;

        return $this;
    }

    public function getTottva(): ?string
    {
        return $this->tottva;
    }

    public function setTottva(string $tottva): self
    {
        $this->tottva = $tottva;

        return $this;
    }

    public function getTotttc(): ?string
    {
        return $this->totttc;
    }

    public function setTotttc(string $totttc): self
    {
        $this->totttc = $totttc;

        return $this;
    }


}
