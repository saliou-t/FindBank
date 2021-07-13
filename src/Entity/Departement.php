<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DepartementRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
#[ApiResource(
    itemOperations:[
        'get',
        'Delete'
    ],
    normalizationContext:[
        'get'=>['normalization_context'=>['groups'=>'read:departement']]
    ]
)]

#[ApiFilter(SearchFilter::class, properties:['id' => 'exact','nom' => 'partial'])]

class Departement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read:departement")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("read:departement")
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Commune::class, mappedBy="departement")
     * @Groups("read:departement")
     */
    private $commune;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="departement")
     */
    private $region;

    public function __construct()
    {
        $this->commune = new ArrayCollection();
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
     * @return Collection|Commune[]
     */
    public function getCommune(): Collection
    {
        return $this->commune;
    }

    public function addCommune(Commune $commune): self
    {
        if (!$this->commune->contains($commune)) {
            $this->commune[] = $commune;
            $commune->setDepartement($this);
        }

        return $this;
    }

    public function removeCommune(Commune $commune): self
    {
        if ($this->commune->removeElement($commune)) {
            // set the owning side to null (unless already changed)
            if ($commune->getDepartement() === $this) {
                $commune->setDepartement(null);
            }
        }

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }
}
