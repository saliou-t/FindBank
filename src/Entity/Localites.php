<?php

namespace App\Entity;

use App\Repository\LocalitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalitesRepository::class)
 */
class Localites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $quartier;

    /**
     * @ORM\OneToMany(targetEntity=Banques::class, mappedBy="localite")
     */
    private $banques;

    /**
     * @ORM\ManyToOne(targetEntity=Quartier::class, inversedBy="localites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdQuertier;

    public function __construct()
    {
        $this->banques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(string $quartier): self
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * @return Collection|Banques[]
     */
    public function getBanques(): Collection
    {
        return $this->banques;
    }

    public function addBanque(Banques $banque): self
    {
        if (!$this->banques->contains($banque)) {
            $this->banques[] = $banque;
            $banque->setLocalite($this);
        }

        return $this;
    }

    public function removeBanque(Banques $banque): self
    {
        if ($this->banques->removeElement($banque)) {
            // set the owning side to null (unless already changed)
            if ($banque->getLocalite() === $this) {
                $banque->setLocalite(null);
            }
        }

        return $this;
    }

    public function getIdQuertier(): ?Quartier
    {
        return $this->IdQuertier;
    }

    public function setIdQuertier(?Quartier $IdQuertier): self
    {
        $this->IdQuertier = $IdQuertier;

        return $this;
    }
}
