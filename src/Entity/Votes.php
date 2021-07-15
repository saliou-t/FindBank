<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VotesRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=VotesRepository::class)
 */
#[ApiResource(
    itemOperations:[
        'get'
    ],    
    collectionOperations: [
        'get'=>['normalization_context'=> ['groups' => 'read:vote']]
    ]

)]  

class Votes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Banques::class, inversedBy="votes")
     */
    private $id_banque;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBanque(): ?Banques
    {
        return $this->id_banque;
    }

    public function setIdBanque(?Banques $id_banque): self
    {
        $this->id_banque = $id_banque;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(?int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }
}
