<?php

namespace App\Entity;

use App\Repository\OperateursRepository;
<<<<<<< HEAD

use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
=======
>>>>>>> parent of d1a7d6f (Mise en place d'un espace d'administration)
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperateursRepository::class)
 */
class Operateurs
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
     * @ORM\Column(type="text")
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_banks;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logoUrl;

    /**
     * @ORM\OneToMany(targetEntity=Banques::class, mappedBy="operateur")
=======
     * @ORM\OneToMany(targetEntity=Banques::class, mappedBy="nom")
>>>>>>> parent of d1a7d6f (Mise en place d'un espace d'administration)
     */
    private $banques;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chiffre_affaire;

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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNbreBanks(): ?int
    {
        return $this->nbre_banks;
    }

    public function setNbreBanks(int $nbre_banks): self
    {
        $this->nbre_banks = $nbre_banks;

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
            $banque->setNom($this);
        }

        return $this;
    }

    public function removeBanque(Banques $banque): self
    {
        if ($this->banques->removeElement($banque)) {
            // set the owning side to null (unless already changed)
            if ($banque->getNom() === $this) {
                $banque->setNom(null);
            }
        }

        return $this;
    }
}
