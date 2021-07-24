<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OperateursRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Controller\OperateurBanqueController;

/**
 * @ORM\Entity(repositoryClass=OperateursRepository::class)
 */ 
#[ApiResource(
    itemOperations:[
        'get' => [
            
        ],
        'getOp'=>[  
            'method' => 'GET',
            'path' => 'operateur/{id}/Banques',
            'controller' => OperateurBanqueController::class,
            'openapi_context' => [
                'summary' => 'Permet de récupérer les banques pour un opérateur spécifique',
            ] 
        ]
    ],
    collectionOperations: [
        'get'=>['normalization_context' => ['groups' => 'read:operateur', 'read:item']],
    ]
)]  
#[ApiFilter(SearchFilter::class, properties:['nom' => 'partial'])]

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
     * @Groups("read:operateur", "read:banques")
     */
    private $nom;

    /**
     * @Groups("read:operateur")
     * @ORM\Column(type="text")
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_banks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chiffre_affaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logoUrl;

    /**
     * @ORM\OneToMany(targetEntity=Banques::class, mappedBy="operateur")
     * @Groups("read:operateur")
     */
    private $banques;

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

    public function getChiffreAffaire(): ?string
    {
        return $this->chiffre_affaire;
    }

    public function setChiffreAffaire(?string $chiffre_affaire): self
    {
        $this->chiffre_affaire = $chiffre_affaire;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(?string $logoUrl): self
    {
        $this->logoUrl = $logoUrl;

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
            $banque->setOperateur($this);
        }

        return $this;
    }

    public function removeBanque(Banques $banque): self
    {
        if ($this->banques->removeElement($banque)) {
            // set the owning side to null (unless already changed)
            if ($banque->getOperateur() === $this) {
                $banque->setOperateur(null);
            }
        }

        return $this;
    }
}
