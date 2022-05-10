<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="IDX_A60C9F1F19EB6921", columns={"client_id"})})
 * @ORM\Entity
 */
class Livraison
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

    /**
     * @var string
     *
     * @ORM\Column(name="dateliv", type="string", length=50, nullable=false)
     */
    private $dateliv;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

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

    public function getDateliv(): ?string
    {
        return $this->dateliv;
    }

    public function setDateliv(string $dateliv): self
    {
        $this->dateliv = $dateliv;

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


}
