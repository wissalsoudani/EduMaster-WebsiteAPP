<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity
 */
class Abonnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_abonnement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAbonnement;

    /**
     * @var string
     *
     * @ORM\Column(name="login_user", type="string", length=20, nullable=false)
     */
    private $loginUser;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="text", length=65535, nullable=false)
     */
    private $type;

    public function getIdAbonnement(): ?int
    {
        return $this->idAbonnement;
    }

    public function getLoginUser(): ?string
    {
        return $this->loginUser;
    }

    public function setLoginUser(string $loginUser): self
    {
        $this->loginUser = $loginUser;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


}
