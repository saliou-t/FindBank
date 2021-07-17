<?php

namespace App\Controller;

use App\Entity\Search;
use App\Form\SearchFormType;
use App\Repository\BanquesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class BanquesController extends AbstractController
{
    // #[Route('/banques/api', name: 'banquesResources')]

    // public function BanksResources(BanquesRepository $banquesRepository): Response
    // {
    //     // $reponses = $serializerInterface->serialize($banques,'json',['groups'=>"banques:read"]);
    //     //je retourn la réponse au format JSON 
    //     return $this->json($banquesRepository->findAll(),200,[],['groups'=>'read:banques']);        
    // } 

    // #[Route('/', name: 'banques')]
    // public function findBansk(BanquesRepository $banquesRepository, Request $request){

    //     // $search = new Search();

    //     // $formBuilder = $this->createForm(SearchType::class,$search);
    //     // $formBuilder->handleRequest($request);
                    
    //     return $this->render('banques/banques.html.twig', [
    //         'banques' => $banquesRepository->findAll(),
    //         // 'form' =>  $formBuilder->createVie()
    //     ]);
    // }


    // #[Route('/region/{id}', name:'regionShowBanks')]
    // public function showByRegion($id, RegionRepository $region){

    //     $regionContent = $region->findOneBy($id);
    //     dd($region);

    //     return $this->render('location/regionShowBanks.html.twig',[
    //         'region' =>$regionContent
    //     ]);
    // }
}
