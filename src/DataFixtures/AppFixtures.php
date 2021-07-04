<?php

namespace App\DataFixtures;
// use Faker\Factory;
use Faker;

use Faker\Factory;

use App\Entity\Banques;
use App\Entity\Departement;
use App\Entity\Operateurs;
use App\Entity\Region;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create();
        //Je veux créer 16 opérateurs
        
        $nomBanks = ['','UBA','BCAO','BOA','BHS','BICIS','Citi Banque','ICB','LocaAfrik','CS','Ecobank','BSS','CNCA','BRSS','ICB','BAS','BIS', ];
        for($i=1; $i<=15; $i++){

            $bank = $nomBanks[$i];

            $chiffreAffaire = $faker->numberBetween(25, 100)."M £uro";

            $operateur = new Operateurs();
            $operateur->setNom($bank)
                      ->setLibelle($faker->paragraph(2))
                      ->setChiffreAffaire($chiffreAffaire)
                      ->setNbreBanks($faker->numberBetween(11,23));

            $manager->persist($operateur);

            //je veux créer autant des régions

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
            }            
        }
        $manager->flush();
    }
}