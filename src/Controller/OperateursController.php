<?php

namespace App\Controller;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OperateursRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OperateursController extends AbstractController
{
    #[Route('/operateurs', name: 'operateurs')]
    public function operateurs( OperateursRepository $opRepo){
        $operateurs = $opRepo->findAll();
        
        return $this->render('operateurs/index.html.twig',[
            'operateurs' => $operateurs 
        ]);
    }
}
