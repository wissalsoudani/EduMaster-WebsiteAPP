<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultatTestHistoire
 *
 * @ORM\Table(name="resultat_test_histoire", indexes={@ORM\Index(name="fk_idtest", columns={"id_test"})})
 * @ORM\Entity
 */
class ResultatTestHistoire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_resultat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResultat;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", nullable=false)
     */
    private $score;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="ligne_histoire", type="integer", nullable=false, options={"default"="-1"})
     */
    private $ligneHistoire = -1;

    /**
     * @var \TestHistoire
     *
     * @ORM\ManyToOne(targetEntity="TestHistoire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_test", referencedColumnName="id_test")
     * })
     */
    private $idTest;

    public function getIdResultat(): ?int
    {
        return $this->idResultat;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLigneHistoire(): ?int
    {
        return $this->ligneHistoire;
    }

    public function setLigneHistoire(int $ligneHistoire): self
    {
        $this->ligneHistoire = $ligneHistoire;

        return $this;
    }

    public function getIdTest(): ?TestHistoire
    {
        return $this->idTest;
    }

    public function setIdTest(?TestHistoire $idTest): self
    {
        $this->idTest = $idTest;

        return $this;
    }


}
