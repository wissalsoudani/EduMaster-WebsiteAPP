<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
 

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
     * @Groups("post:read")
     */
    private $idHistoire;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=255, nullable=false)
     */
    private $langue;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_histoire", type="string", length=255, nullable=false)
     * @Groups("post:read")
     */
    private $nomHistoire;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_histoire", type="string", length=255, nullable=false)
     */
    private $contenuHistoire;

    /**
     * @var string
     *
     * @ORM\Column(name="couverture_histoire", type="string", length=255, nullable=false)
     * @Groups("post:read")

     */
    private $couvertureHistoire;

    /**
     * @var string
     *
     * @ORM\Column(name="catégorie", type="string", length=255, nullable=false)
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
