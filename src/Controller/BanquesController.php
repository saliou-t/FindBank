<?php

namespace App\Controller;

use App\Entity\Votes;
use App\Repository\BanquesRepository;
use Proxies\__CG__\App\Entity\Region;
use App\Repository\OperateursRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BanquesController extends AbstractController
{
    // #[Route('/banques/api', name: 'banquesResources')]

    // public function BanksResources(BanquesRepository $banquesRepository): Response
    // {
    //     // $reponses = $serializerInterface->serialize($banques,'json',['groups'=>"banques:read"]);
    //     //je retourn la réponse au format JSON 
    //     return $this->json($banquesRepository->findAll(),200,[],['groups'=>'banques:read']);        
    // } 

    #[Route('/', name: 'banques')]
    public function findBansk(BanquesRepository $banquesRepository){
            
        return $this->render('banques/banques.html.twig', [
            'banques' => $banquesRepository->findAll()
        ]);
    }


    // #[Route('/region/{id}', name:'regionShowBanks')]
    // public function showByRegion($id, RegionRepository $region){

    //     $regionContent = $region->findOneBy($id);
    //     dd($region);

    //     return $this->render('location/regionShowBanks.html.twig',[
    //         'region' =>$regionContent
    //     ]);
    // }
}
