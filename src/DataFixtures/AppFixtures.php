<?php

namespace App\DataFixtures;
// use Faker\Factory;
use Faker;

use Faker\Factory;

use App\Entity\Banques;
use App\Entity\Commune;
use App\Entity\Departement;
use App\Entity\Localites;
use App\Entity\Operateurs;
use App\Entity\Quartier;
use App\Entity\Region;
use App\Entity\Votes;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create();
        //Je veux créer 16 opérateurs
        $liste_operateur = [];
        
        for($i=0; $i<= 6; $i++){
            $nomOperators = ['UBA','LocaAfrik','BHS','CS','BSS','ICB','Ecobank','BAS','BIS' ];

            $oprators = $nomOperators[$i];

            $chiffreAffaire = $faker->numberBetween(25, 100)."M £uro";

            $chiffreAffaire = $faker->numberBetween(25, 100)."M £uro";

            $operateur = new Operateurs();
            $operateur->setNom($oprators)
                      ->setLibelle($faker->paragraph(2))
                      ->setChiffreAffaire($chiffreAffaire)
                      ->setNbreBanks($faker->numberBetween(11,23));

            $manager->persist($operateur);
            $liste_operateur[] = $operateur;
        }

            //je veux créer autant des régions
        for ($j=0; $j <= 4  ; $j++) { 
            $Nomregions = ['Dakar','Thiès','Diourbel','Fatick','Kaolack'];

            $Nomregions = ['','Dakar','Thiès','Diourbel','Fatick','Tambacounda','Kaolack'];

            for ($j=1; $j <count($Nomregions) ; $j++) { 
                $reg = $Nomregions[$j];
                
                $region = new Region();
                $region->setNom($reg)
                       ->setPostal($faker->postcode())
                       ->setSuperficie($faker->numberBetween(150,310));
            $manager->persist($region);

            //Pour chaque régionn, je veux créer des departemants
                for ($k=0; $k <mt_rand(4,10) ; $k++) { 
                    
                    $departement = new Departement();
                    $departement->setNom($faker->city())
                                ->setRegion($region->getId());
                    $manager->persist($departement);

                    //pour chaque departement, je veux créer des communes

                    for ($l=0; $l <mt_rand(3,10) ; $l++) { 
                        
                    }
                }
            $region = new Region();

            $reg = $Nomregions[$j];
            
            $region->setNom($reg)
                    ->setPostal($faker->postcode())
                    ->setSuperficie($faker->numberBetween(150,310));
            $manager->persist($region);

                    //Pour chaque régionn, je veux créer des departemants
                for ($k=0; $k <mt_rand(3,4) ; $k++) { 
                    
                    $departement = new Departement();
                    $departement->setNom($faker->city())
                                ->setRegion($region);
                    $manager->persist($departement);

                    //pour chaque departement, je veux créer des communes
                    for ($l=1; $l <mt_rand(2,5) ; $l++) { 
                        $commue = new Commune();   
                        $commue->setNom($faker->city())
                                ->setDepartement($departement);

                        $manager->persist($commue);

                        //pour chaque departement, je veux créer des quartiers
                        for ($m=1; $m < mt_rand(2,3); $m++) { 
                            $quartier = new Quartier();
                            $quartier->setNom($faker->city())
                                        ->setCommune($commue);
                            $manager->persist($quartier);

                            //maintenant, dans chaque quartier, nous avons des localités
                            for ($n=1; $n <mt_rand(2,3) ; $n++) { 
                                $localite = new Localites();

                                $localite->setNom(strtoupper($faker->citySuffix()))
                                        ->setQuartier($quartier);

                                $manager->persist($localite);
                            
            //je veux créer autant de banques que je veux pour chaque localité
                                for ($p=1; $p < mt_rand(1,2) ; $p++) { 
                                    
                                    $banque = new Banques();

                                    $phoneNumber = "+221 ".$faker->phoneNumber();

                                    $operateur_key = mt_rand(1,6);

                                    $banque->setOperateur($liste_operateur[$operateur_key])
                                            ->setLocalite($localite)
                                            ->setLatitude($faker->latitude(-90,90))
                                            ->setLongitude($faker->longitude(-180,180))
                                            ->setJoursOuverture(mt_rand(1,7)."j/7")
                                            ->setHeurOuverture(mt_rand(7,11)." H")
                                            ->setHeurFermiture(mt_rand(13,17)." H")
                                            ->setAdresse($faker->address())
                                            ->setTelephone($phoneNumber);

                                    $manager->persist($banque);
                                
                                    //maitenant pour chaque banque, on veux créer des votes

                                    for ($t=0; $t <1 ; $t++) { 
                                        $vote = new Votes();

                                        $vote->setIdBanque($banque)
                                                ->setValeur(mt_rand(0,5));

                                        $manager->persist($vote);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $manager->flush();
        }
    }
}
