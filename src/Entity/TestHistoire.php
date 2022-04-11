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


}
