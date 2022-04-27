<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Histoire
 *
 * @ORM\Table(name="histoire")
 * @ORM\Entity
 */
class Histoire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_histoire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistoire;

    /**
     * @var int
     * @ORM\Column(name="age", type="integer", nullable=false)
     * @Assert\Range(min="7",max="12",notInRangeMessage="Age must be between {{ min }}ans and {{ max }}ans to enter")
     * @Assert\NotBlank(message="Age is required")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="langue is required")
     */
    private $langue;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_histoire", type="string", length=255, nullable=false)
     * @Assert\Length(min=5, max=20)
     * @Assert\NotBlank(message="the name is required")
     */
    private $nomHistoire;

    /**
     * @var string
     * @ORM\Column(name="contenu_histoire", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="content is required")
     */
    private $contenuHistoire;

    /**
     * @var string
     *
     * @ORM\Column(name="couverture_histoire", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="cover is required")

     */
    private $couvertureHistoire;

    /**
     * @var string
     *
     * @ORM\Column(name="catégorie", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="category is required")

     */
    private $categorie;

    public function getIdHistoire(): ?int
    {
        return $this->idHistoire;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getNomHistoire(): ?string
    {
        return $this->nomHistoire;
    }

    public function setNomHistoire(string $nomHistoire): self
    {
        $this->nomHistoire = $nomHistoire;

        return $this;
    }

    public function getContenuHistoire(): ?string
    {
        return $this->contenuHistoire;
    }

    public function setContenuHistoire(string $contenuHistoire): self
    {
        $this->contenuHistoire = $contenuHistoire;

        return $this;
    }

    public function getCouvertureHistoire(): ?string
    {
        return $this->couvertureHistoire;
    }

    public function setCouvertureHistoire(string $couvertureHistoire): self
    {
        $this->couvertureHistoire = $couvertureHistoire;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


}
