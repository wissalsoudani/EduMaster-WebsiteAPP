<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_articles", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticles;

    /**
     * @var string
     *
     * @ORM\Column(name="date_article", type="string", length=255, nullable=false)
     */
    private $dateArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_like", type="integer", nullable=false)
     */
    private $nombreLike;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_commentaire", type="integer", nullable=false)
     */
    private $nombreCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=256, nullable=false)
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "[a-zA-Z]+"
     * )
     * @Assert\NotBlank
     */

    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=Activites::class, inversedBy="articles")
     * @ORM\JoinColumn(name="idActivites", referencedColumnName="id_activites")
     */
    private $activite;

    public function getIdArticles(): ?int
    {
        return $this->idArticles;
    }

    public function getDateArticle(): ?string
    {
        return $this->dateArticle;
    }

    public function setDateArticle(string $dateArticle): self
    {
        $this->dateArticle = $dateArticle;

        return $this;
    }

    public function getNombreLike(): ?int
    {
        return $this->nombreLike;
    }

    public function setNombreLike(int $nombreLike): self
    {
        $this->nombreLike = $nombreLike;

        return $this;
    }

    public function getNombreCommentaire(): ?int
    {
        return $this->nombreCommentaire;
    }

    public function setNombreCommentaire(int $nombreCommentaire): self
    {
        $this->nombreCommentaire = $nombreCommentaire;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getActivite(): ?Activites
    {
        return $this->activite;
    }

    public function setActivite(?Activites $activite): self
    {
        $this->activite = $activite;

        return $this;
    }


}
