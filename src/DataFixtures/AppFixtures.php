<?php

namespace App\DataFixtures;
// use Faker\Factory;
use Faker;

use Faker\Factory;

use App\Entity\Banques;
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

            $operateur = new Operateurs();
            $operateur->setNom($bank)
                      ->setLibelle($faker->paragraph(2))
                      ->setNbreBanks($faker->numberBetween(11,23));

            $manager->persist($operateur);

            //je veux créer autant des régions

            $Nomregions = ['Dakar','Thiès','Diourbel','Fatick','Tambacounda'];

            for ($j=1; $j < count($Nomregions) ; $j++) { 
                
                $region = new Region();
                $region->nom()
            }

            
        }
        $manager->flush();
    
    }
}