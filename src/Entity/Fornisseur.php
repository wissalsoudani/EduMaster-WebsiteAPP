<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fornisseur
 *
 * @ORM\Table(name="fornisseur")
 * @ORM\Entity
 */
class Fornisseur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }


}
