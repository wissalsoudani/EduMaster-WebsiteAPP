<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAbo
 *
 * @ORM\Table(name="type_abo")
 * @ORM\Entity
 */
class TypeAbo
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $type;

    public function getType(): ?string
    {
        return $this->type;
    }


}
