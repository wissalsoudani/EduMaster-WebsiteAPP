<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity
 */
class Fournisseur
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
     * @ORM\Column(name="code", type="string", length=50, nullable=false)
    * @Assert\NotBlank(message="Code est obligatoire")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="libelle est obligatoire")

     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="responsable est obligatoire")

     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="adresse est obligatoire")

     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="ville est obligatoire")

     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="tel est obligatoire")

     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="portable", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="portable est obligatoire")

     */
    private $portable;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="email est obligatoire")

     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="matfisc", type="string", length=50, nullable=false)
         * @Assert\NotBlank(message="matfisc est obligatoire")

     */
    private $matfisc;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=50, nullable=false)
              * @Assert\NotBlank(message="cin est obligatoire")

     */
    private $cin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMatfisc(): ?string
    {
        return $this->matfisc;
    }

    public function setMatfisc(string $matfisc): self
    {
        $this->matfisc = $matfisc;

        return $this;
    }

    

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }


}
