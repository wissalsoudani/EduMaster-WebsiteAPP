<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $couvertureHistoire;

    /**
     * @var string
     *
     * @ORM\Column(name="catégorie", type="string", length=255, nullable=false)
     */
    private $catégorie;


}
