<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BanquesRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=BanquesRepository::class)
 */
#[ApiResource()]  
#[ApiFilter(SearchFilter::class, properties:['id' => 'exact','operateur' => 'partial'])]

class Banques
{
    /**
     * @ORM\Id
     * @Groups("read:banques")
     * @ORM\Column(type="integer")
     */
    public $id;
    
    /**
     * @ORM\ManyToOne(targetEntity=Localites::class, inversedBy="banques")
     */
    private $localite;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $jours_ouverture;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $heur_ouverture;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $heur_fermiture;

    /**
     * @ORM\OneToMany(targetEntity=Votes::class, mappedBy="id_banque")
     */
    private $votes;

    /**
     * @ORM\Column(type="string")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=Operateurs::class, inversedBy="banques")
     */
    private $operateur;

    public function __construct()
    {
        $this->votes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getJoursOuverture(): ?string
    {
        return $this->jours_ouverture;
    }

    public function setJoursOuverture(?string $jours_ouverture): self
    {
        $this->jours_ouverture = $jours_ouverture;

        return $this;
    }

    public function getHeurOuverture(): ?string
    {
        return $this->heur_ouverture;
    }

    public function setHeurOuverture(?string $heur_ouverture): self
    {
        $this->heur_ouverture = $heur_ouverture;

        return $this;
    }

    public function getHeurFermiture(): ?string
    {
        return $this->heur_fermiture;
    }

    public function setHeurFermiture(?string $heur_fermiture): self
    {
        $this->heur_fermiture = $heur_fermiture;

        return $this;
    }

    /**
     * @return Collection|Votes[]
     */
    public function getVotes(): Collection
    {
        return $this->votes;
    }

    public function addVote(Votes $vote): self
    {
        if (!$this->votes->contains($vote)) {
            $this->votes[] = $vote;
            $vote->setIdBanque($this);
        }

        return $this;
    }

    public function removeVote(Votes $vote): self
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getIdBanque() === $this) {
                $vote->setIdBanque(null);
            }
        }

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getOperateur(): ?Operateurs
    {
        return $this->operateur;
    }

    public function setOperateur(?Operateurs $operateur): self
    {
        $this->operateur = $operateur;

        return $this;
    }
}
