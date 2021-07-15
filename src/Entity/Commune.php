<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommuneRepository::class)
 */
class Commune
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Quartier::class, mappedBy="commune")
     */
    private $quatier;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="commune")
     */
    private $departement;

    public function __construct()
    {
        $this->quatier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Quartier[]
     */
    public function getQuatier(): Collection
    {
        return $this->quatier;
    }

    public function addQuatier(Quartier $quatier): self
    {
        if (!$this->quatier->contains($quatier)) {
            $this->quatier[] = $quatier;
            $quatier->setCommune($this);
        }

        return $this;
    }

    public function removeQuatier(Quartier $quatier): self
    {
        if ($this->quatier->removeElement($quatier)) {
            // set the owning side to null (unless already changed)
            if ($quatier->getCommune() === $this) {
                $quatier->setCommune(null);
            }
        }

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }
}
