<?php

namespace App\Controller;

use App\Entity\Votes;
use App\Repository\BanquesRepository;
use App\Repository\OperateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BanquesController extends AbstractController
{
    #[Route('/', name: 'banques')]
    public function findBankss(BanquesRepository $banquesRepository, OperateursRepository $operateursRepository): Response
    {
        $banques = $banquesRepository->findAll();

        return $this->render('banques/banques.html.twig', [
            'banques' =>$banques 
        ]);
    }
    
}
