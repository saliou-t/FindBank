<?php

namespace App\Controller;

use App\Entity\Banques;
use App\Entity\Search;
use App\Form\BanquesType;
use App\Repository\BanquesRepository;
use App\Repository\OperateursRepository;
use Proxies\__CG__\App\Entity\Operateurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/banques')]
class BanquesController2Controller extends AbstractController
{
    #[Route('/', name: 'banques_controller2_index', methods: ['GET'])]
    public function index(BanquesRepository $banquesRepository): Response
    {
        // $banks_per_page = $paginator->paginate(
        //     $banquesRepository->findAll(),
        //     $request->query->getInt('page',1),
        //     4
        // );

        return $this->render('banques_controller2/index.html.twig', [
            'banques' => $banquesRepository->findAll()
        ]);
    }

    #[Route('/new', name: 'banques_controller2_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $banque = new Banques();
        $form = $this->createForm(BanquesType::class, $banque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($banque);
            $entityManager->flush();

            return $this->redirectToRoute('banques_controller2_index');
        }

        return $this->render('banques_controller2/new.html.twig', [
            'banque' => $banque,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'banques_controller2_show', methods: ['GET'])]
    public function show(Banques $banque): Response
    {
        return $this->render('banques_controller2/show.html.twig', [
            'banque' => $banque,
        ]);
    }

    #[Route('banques/search', name: 'search')]

    public function search( Request $request, OperateursRepository $operateursRepository){

        $searchForm = $this->createForm(BanquesType::class);

        $searchForm->handleRequest($request);

         if ($searchForm->isSubmitted() && $searchForm->isValid()) {

            // $data = $searchForm->getData();
             dd($data);
         }
        // $searchForm = $searchForm->getForm();

        return $this->render('banques/search.html.twig',[
            'searchForm' => $searchForm->createView(),
        ]);
    }

}
