<?php

namespace App\DataFixtures;
use App\Entity\Banques;
use App\Entity\Operateurs;

use Faker\Factory;
use App\Repository\BanquesRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $nomBanks = ['UBA','BCAO','BOA','SGBS','BHS','BICIS','Citi Banque','ICB','LocaAfrik','CS','Ecobank','BSS','CNCA','BRSS','ICB','BAS'];
        
        // $faker = Faker\Factory::create('fr_FR');

        // //Je veux créer 16 opérateurs
        // for($i=1; $i<=count($nomBanks); $i++){

        //     $libelle = '<p>'.join($faker->paragraphs(2), '</p><p>') .'</p>';
            
        //     $operateur = new Operateurs();

        //     $operateur->setNom($nomBanks[$i])
        //     $operateur->setLibelle($faker->sentence())
        //     $operateur->setNbreBanks(16);
        
        }
        // $product = new Product();
        // $manager->persist($product);

        // $manager->flush();
    
}
