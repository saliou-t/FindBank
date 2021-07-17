<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RegionRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
#[ApiResource(
    itemOperations:[
        'get'
    ],
    collectionOperations: [
        'get'=>['normalization_context'=> ['groups' => 'read:region']]
    ]
)]
#[ApiFilter(SearchFilter::class, properties:['id' => 'exact','nom' => 'partial'])]

class Region
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:region")
     */
    private $nom;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $superficie;

    /**
     * @ORM\OneToMany(targetEntity=Departement::class, mappedBy="region")
     * @Groups("read:region")
     */
    private $departement;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $postal;

    public function __construct()
    {
        $this->departement = new ArrayCollection();
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

    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    public function setSuperficie(?float $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * @return Collection|Departement[]
     */
    public function getDepartement(): Collection
    {
        return $this->departement;
    }

    public function addDepartement(Departement $departement): self
    {
        if (!$this->departement->contains($departement)) {
            $this->departement[] = $departement;
            $departement->setRegion($this);
        }

        return $this;
    }

    public function removeDepartement(Departement $departement): self
    {
        if ($this->departement->removeElement($departement)) {
            // set the owning side to null (unless already changed)
            if ($departement->getRegion() === $this) {
                $departement->setRegion(null);
            }
        }

        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->postal;
    }

    public function setPostal(?string $postal): self
    {
        $this->postal = $postal;

        return $this;
    }
}
