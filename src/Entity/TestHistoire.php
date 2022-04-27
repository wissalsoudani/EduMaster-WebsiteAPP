<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestHistoire
 *
 * @ORM\Table(name="test_histoire", indexes={@ORM\Index(name="fk_idhistoire", columns={"id_histoire"})})
 * @ORM\Entity
 */
class TestHistoire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_test", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTest;

    /**
     * @var string
     *
     * @ORM\Column(name="question1", type="string", length=255, nullable=false)
     */
    private $question1;

    /**
     * @var string
     *
     * @ORM\Column(name="R11", type="string", length=255, nullable=false)
     */
    private $r11;

    /**
     * @var string
     *
     * @ORM\Column(name="R12", type="string", length=255, nullable=false)
     */
    private $r12;

    /**
     * @var string
     *
     * @ORM\Column(name="R13", type="string", length=255, nullable=false)
     */
    private $r13;

    /**
     * @var string
     *
     * @ORM\Column(name="correctionQ1", type="string", length=255, nullable=false)
     */
    private $correctionq1;

    /**
     * @var string
     *
     * @ORM\Column(name="question2", type="string", length=255, nullable=false)
     */
    private $question2;

    /**
     * @var string
     *
     * @ORM\Column(name="R21", type="string", length=255, nullable=false)
     */
    private $r21;

    /**
     * @var string
     *
     * @ORM\Column(name="R22", type="string", length=255, nullable=false)
     */
    private $r22;

    /**
     * @var string
     *
     * @ORM\Column(name="R23", type="string", length=255, nullable=false)
     */
    private $r23;

    /**
     * @var string
     *
     * @ORM\Column(name="correctionQ2", type="string", length=255, nullable=false)
     */
    private $correctionq2;

    /**
     * @var string
     *
     * @ORM\Column(name="question3", type="string", length=255, nullable=false)
     */
    private $question3;

    /**
     * @var string
     *
     * @ORM\Column(name="R31", type="string", length=255, nullable=false)
     */
    private $r31;

    /**
     * @var string
     *
     * @ORM\Column(name="R32", type="string", length=255, nullable=false)
     */
    private $r32;

    /**
     * @var string
     *
     * @ORM\Column(name="R33", type="string", length=255, nullable=false)
     */
    private $r33;

    /**
     * @var string
     *
     * @ORM\Column(name="correctionQ3", type="string", length=255, nullable=false)
     */
    private $correctionq3;

    /**
     * @var \Histoire
     *
     * @ORM\ManyToOne(targetEntity="Histoire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_histoire", referencedColumnName="id_histoire")
     * })
     */
    private $idHistoire;

    public function getIdTest(): ?int
    {
        return $this->idTest;
    }

    public function getQuestion1(): ?string
    {
        return $this->question1;
    }

    public function setQuestion1(string $question1): self
    {
        $this->question1 = $question1;

        return $this;
    }

    public function getR11(): ?string
    {
        return $this->r11;
    }

    public function setR11(string $r11): self
    {
        $this->r11 = $r11;

        return $this;
    }

    public function getR12(): ?string
    {
        return $this->r12;
    }

    public function setR12(string $r12): self
    {
        $this->r12 = $r12;

        return $this;
    }

    public function getR13(): ?string
    {
        return $this->r13;
    }

    public function setR13(string $r13): self
    {
        $this->r13 = $r13;

        return $this;
    }

    public function getCorrectionq1(): ?string
    {
        return $this->correctionq1;
    }

    public function setCorrectionq1(string $correctionq1): self
    {
        $this->correctionq1 = $correctionq1;

        return $this;
    }

    public function getQuestion2(): ?string
    {
        return $this->question2;
    }

    public function setQuestion2(string $question2): self
    {
        $this->question2 = $question2;

        return $this;
    }

    public function getR21(): ?string
    {
        return $this->r21;
    }

    public function setR21(string $r21): self
    {
        $this->r21 = $r21;

        return $this;
    }

    public function getR22(): ?string
    {
        return $this->r22;
    }

    public function setR22(string $r22): self
    {
        $this->r22 = $r22;

        return $this;
    }

    public function getR23(): ?string
    {
        return $this->r23;
    }

    public function setR23(string $r23): self
    {
        $this->r23 = $r23;

        return $this;
    }

    public function getCorrectionq2(): ?string
    {
        return $this->correctionq2;
    }

    public function setCorrectionq2(string $correctionq2): self
    {
        $this->correctionq2 = $correctionq2;

        return $this;
    }

    public function getQuestion3(): ?string
    {
        return $this->question3;
    }

    public function setQuestion3(string $question3): self
    {
        $this->question3 = $question3;

        return $this;
    }

    public function getR31(): ?string
    {
        return $this->r31;
    }

    public function setR31(string $r31): self
    {
        $this->r31 = $r31;

        return $this;
    }

    public function getR32(): ?string
    {
        return $this->r32;
    }

    public function setR32(string $r32): self
    {
        $this->r32 = $r32;

        return $this;
    }

    public function getR33(): ?string
    {
        return $this->r33;
    }

    public function setR33(string $r33): self
    {
        $this->r33 = $r33;

        return $this;
    }

    public function getCorrectionq3(): ?string
    {
        return $this->correctionq3;
    }

    public function setCorrectionq3(string $correctionq3): self
    {
        $this->correctionq3 = $correctionq3;

        return $this;
    }

    public function getIdHistoire(): ?Histoire
    {
        return $this->idHistoire;
    }

    public function setIdHistoire(?Histoire $idHistoire): self
    {
        $this->idHistoire = $idHistoire;

        return $this;
    }


}
