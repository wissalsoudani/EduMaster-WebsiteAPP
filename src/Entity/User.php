<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Repository\UserSecurityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_user;
 
    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $login;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $mdp;
      /**
     * @ORM\Column(type="string", length=180)
     */
    private $nom;
     /**
     * @ORM\Column(type="string", length=180)
     */
    private $prenom; 
     /**
     * @ORM\Column(type="string", length=60)
     */
    private $mail;
      /**
     * @ORM\Column(type="integer", length=11)
     */
    private $niveau;

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }
    public function getId(): ?int
    {
        return $this->id_user;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }
    public function setNom(string $nom): self
    {
        $this->nom= $nom;

        return $this;
    }
    public function getNom(): ?string 
    {
        return $this->nom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom= $prenom;

        return $this;
    }
    public function getprenom(): ?string 
    {
        return $this->prenom;
    }
    public function setmail(string $mail): self
    {
        $this->mail= $mail;

        return $this;
    }
    public function getMail(): ?string 
    {
        return $this->mail;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->login;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->mdp;
    }

    public function setPassword(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAbonnement(): ?Abonnement
    {
        return $this->idAbonnement;
    }

    public function setAbonnement(Abonnement $idAbonnement): self
    {
        $this->idAbonnement = $idAbonnement;

        return $this;
    }
}
