<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuartierRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=QuartierRepository::class)
 */
#[ApiResource(
    itemOperations:[
        'get'
    ],
    collectionOperations: [
        'get'=>['normalization_context'=> ['groups' => 'read:quartier']]
    ]

)]  

class Quartier
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
     * @ORM\ManyToOne(targetEntity=Commune::class, inversedBy="quatier")
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity=Localites::class, mappedBy="quartier")
     */
    private $localites;

    public function __construct()
    {
        $this->localites = new ArrayCollection();
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

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * @return Collection|Localites[]
     */
    public function getLocalites(): Collection
    {
        return $this->localites;
    }

    public function addLocalite(Localites $localite): self
    {
        if (!$this->localites->contains($localite)) {
            $this->localites[] = $localite;
            $localite->setQuartier($this);
        }

        return $this;
    }

    public function removeLocalite(Localites $localite): self
    {
        if ($this->localites->removeElement($localite)) {
            // set the owning side to null (unless already changed)
            if ($localite->getQuartier() === $this) {
                $localite->setQuartier(null);
            }
        }

        return $this;
    }
}
