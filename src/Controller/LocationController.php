<?php

namespace App\Controller;

use App\Repository\RegionRepository;
use App\Repository\CommuneRepository;
use App\Repository\QuartierRepository;
use App\Repository\DepartementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocationController extends AbstractController
{
    #[Route('/regions', name: 'regions')]
    public function ShowRegion(RegionRepository $regionRepository, DepartementRepository $departementRepository): Response
    {   
        $regions = $regionRepository->findAll();
        $couleurs = ['active','primary','success','secondary','danger','warning','info','light','dark'];
       
        return $this->render('location/region.html.twig', [
            'regions' => $regions,
            'tcolors' => $couleurs
        ]);
    }
    
    #[Route('/departements', name: 'departements')]
    public function ShowRegionDepartement( DepartementRepository $departementRepository)
    {
        $departements = $departementRepository->findAll();
        
        return $this->render('location/departement.html.twig',[
            'departements' => $departements
        ]);
    }
    #[Route('/communes', name: 'communes')]
    public function ShowDepartementCommues( CommuneRepository $communeRepository)
    {
        $communes = $communeRepository->findAll();
        
        return $this->render('location/communes.html.twig',[
            'communes' => $communes
        ]);
    }
    #[Route('/quartiers', name: 'quartiers')]
    public function ShowCommuneQuartier( QuartierRepository $quartierRepository)
    {
        $quartiers = $quartierRepository->findAll();
        
        return $this->render('location/quartiers.html.twig',[
            'quartiers' => $quartiers
        ]);
    }
    
    // #[Route('/{region}', name: 'locality')]
    // public function localite(Request $request, DepartementRepository $departementRepository): Response
    // {   
    //     $request = substr($request->getRequestUri(),1); //ici, dans l'URL, je récupérer le premier paramètre, puis je supprime le "/"
    
    //     $regions = $departementRepository->find($request);

    //     return $this->render('location/locality.html.twig', [
    //         'currentUrl'    => $request,
    //         'regions'       => $regions
    //     ]);
    // }
    
}
