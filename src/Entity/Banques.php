<?php

namespace App\Entity;

use App\Repository\BanquesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BanquesRepository::class)
 */
class Banques
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Operateurs::class, inversedBy="banques")
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Localites::class, inversedBy="banques")
     */
    private $localite;

    /**
     * @ORM\OneToOne(targetEntity=Coordonnees::class, cascade={"persist", "remove"})
     */
    private $coordonnes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?Operateurs
    {
        return $this->nom;
    }

    public function setNom(?Operateurs $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLocalite(): ?Localites
    {
        return $this->localite;
    }

    public function setLocalite(?Localites $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getCoordonnes(): ?Coordonnees
    {
        return $this->coordonnes;
    }

    public function setCoordonnes(?Coordonnees $coordonnes): self
    {
        $this->coordonnes = $coordonnes;

        return $this;
    }
}
