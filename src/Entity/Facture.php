<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity
 */
class Facture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="client", type="string", length=50, nullable=false)
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="base0", type="string", length=50, nullable=false)
     */
    private $base0;

    /**
     * @var string
     *
     * @ORM\Column(name="base1", type="string", length=50, nullable=false)
     */
    private $base1;

    /**
     * @var string
     *
     * @ORM\Column(name="tva1", type="string", length=50, nullable=false)
     */
    private $tva1;

    /**
     * @var string
     *
     * @ORM\Column(name="base2", type="string", length=50, nullable=false)
     */
    private $base2;

    /**
     * @var string
     *
     * @ORM\Column(name="tva2", type="string", length=50, nullable=false)
     */
    private $tva2;

    /**
     * @var string
     *
     * @ORM\Column(name="base3", type="string", length=50, nullable=false)
     */
    private $base3;

    /**
     * @var string
     *
     * @ORM\Column(name="tva3", type="string", length=50, nullable=false)
     */
    private $tva3;

    /**
     * @var string
     *
     * @ORM\Column(name="totht", type="string", length=50, nullable=false)
     */
    private $totht;

    /**
     * @var string
     *
     * @ORM\Column(name="totrem", type="string", length=50, nullable=false)
     */
    private $totrem;

    /**
     * @var string
     *
     * @ORM\Column(name="tottva", type="string", length=50, nullable=false)
     */
    private $tottva;

    /**
     * @var string
     *
     * @ORM\Column(name="timbre", type="string", length=50, nullable=false)
     */
    private $timbre;

    /**
     * @var string
     *
     * @ORM\Column(name="tottc", type="string", length=50, nullable=false)
     */
    private $tottc;

    /**
     * @var string
     *
     * @ORM\Column(name="rs", type="string", length=50, nullable=false)
     */
    private $rs;

    /**
     * @var string
     *
     * @ORM\Column(name="montrs", type="string", length=50, nullable=false)
     */
    private $montrs;

    /**
     * @var string
     *
     * @ORM\Column(name="net", type="string", length=50, nullable=false)
     */
    private $net;


}
