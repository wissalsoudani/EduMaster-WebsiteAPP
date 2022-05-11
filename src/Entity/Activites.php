<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Activites
 *
 * @ORM\Table(name="activites")
 * @ORM\Entity
 *  @Vich\Uploadable
 */
class Activites
{
    /**
     * @Groups("activites")
     * @var int
     *
     * @ORM\Column(name="id_activites", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActivites;

    /**
     * @Groups("activites")
     * @var string
     *
     * @ORM\Column(name="date_activite", type="string", length=255, nullable=false)
     */
    private $dateActivite;

    /**
     * @Groups("activites")
     * @var float
     *
     * @ORM\Column(name="prix_activite", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixActivite;

    /**
     * @Groups("activites")
     * @var string
     *
     * @ORM\Column(name="type_activite", type="string", length=30, nullable=false)
     */
    private $typeActivite;

    /**
     * @Groups("activites")
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "[a-zA-Z]+"
     * )
     */
    private $titre;

    /**
     * @Groups("activites")
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @Groups("activites")
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;
    /**
     * @Groups("activites")
     * @Vich\UploadableField(mapping="activite_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @Groups("activites")
     * @ORM\Column(type="datetime",nullable=true)
     
     */
    private $updatedAt;
    public function setImageFile(File $image = null)
    {
        

        if ($image) {
		$this->imageFile = $image;
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @Groups("activites")
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @ORM\OneToMany(targetEntity=Articles::class, mappedBy="activite")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getIdActivites(): ?int
    {
        return $this->idActivites;
    }

    public function getDateActivite(): ?string
    {
        return $this->dateActivite;
    }

    public function setDateActivite(string $dateActivite): self
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }

    public function getPrixActivite(): ?float
    {
        return $this->prixActivite;
    }

    public function setPrixActivite(float $prixActivite): self
    {
        $this->prixActivite = $prixActivite;

        return $this;
    }

    public function getTypeActivite(): ?string
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(string $typeActivite): self
    {
        $this->typeActivite = $typeActivite;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection<int, Articles>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Articles $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setActivite($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getActivite() === $this) {
                $article->setActivite(null);
            }
        }

        return $this;
    }


}
