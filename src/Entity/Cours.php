<?php

namespace App\Entity;




use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cours", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCours;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cours", type="string", length=30, nullable=false)
     *  @Assert\NotBlank(message="Ce champ est obligatoire")
     */
    private $nomCours;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_cours", type="string", length=150, nullable=false)
     
     */
    private $contenuCours;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_pages", type="integer", nullable=false)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\GreaterThanOrEqual(1,message="le nombre de pages doit être egale a 1 ou plus")
     */
    private $nbPages;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_chapitres", type="integer", nullable=false)
     * @Assert\NotBlank(message="Ce champ est obligatoire")
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      notInRangeMessage = "le nombre de chapitres doit être entre 1 et 5", )
     */
    private $nbChapitres;

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }

    public function getNomCours(): ?string
    {
        return $this->nomCours;
    }

    public function setNomCours(string $nomCours): self
    {
        $this->nomCours = $nomCours;

        return $this;
    }

    public function getContenuCours(): ?string
    {
        return $this->contenuCours;
    }

    public function setContenuCours(string $contenuCours): self
    {
        $this->contenuCours = $contenuCours;

        return $this;
    }

    public function getNbPages(): ?int
    {
        return $this->nbPages;
    }

    public function setNbPages(int $nbPages): self
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    public function getNbChapitres(): ?int
    {
        return $this->nbChapitres;
    }

    public function setNbChapitres(int $nbChapitres): self
    {
        $this->nbChapitres = $nbChapitres;

        return $this;
    }


}
