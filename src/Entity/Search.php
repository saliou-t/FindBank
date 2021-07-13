<?php
namespace App\Entity;


 class Search {

     /**
      * @var string|null 
      */
     private $nom;

     /**
      * @var string|null
      */
     private $localite;

    /**
     * @return string|null
     */
    public function getNom(){
        return $this->nom;
    }

    /**
     * @param string|null
     * @return Search
     */
    public function setNom(?string $nom): ?Search{
        $this->nom = $nom;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getLocalite(): ?string{
        return $this->localite; 
    }
    
    /**
     * @param string|null
     * @return Search
     */
    public function setLocalite(?string $localite): ?Search{
        $this->localite = $localite;
        return $this;
    }
 }
