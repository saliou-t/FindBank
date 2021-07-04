<?php

namespace App\Controller;

use App\Repository\OperateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BanquesController extends AbstractController
{
    #[Route('/', name: 'banques')]
    public function index(): Response
    {
        return $this->render('banques/index.html.twig', [
            'controller_name' => 'BanquesController',
        ]);
    }
    
}
