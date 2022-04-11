<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity
 */
class Video
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_video", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_video", type="string", length=30, nullable=false)
     */
    private $nomVideo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $date = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="duree_video", type="string", length=11, nullable=false)
     */
    private $dureeVideo;


}
