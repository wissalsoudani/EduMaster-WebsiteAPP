<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;


}
