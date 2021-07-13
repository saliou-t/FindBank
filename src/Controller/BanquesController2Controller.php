<?php

namespace App\Controller;

use App\Entity\Banques;
use App\Form\BanquesType;
use App\Repository\BanquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/banques')]
class BanquesController2Controller extends AbstractController
{
    #[Route('/', name: 'banques_controller2_index', methods: ['GET'])]
    public function index(BanquesRepository $banquesRepository): Response
    {
        return $this->render('banques_controller2/index.html.twig', [
            'banques' => $banquesRepository->findAll(),
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

    #[Route('/{id}/edit', name: 'banques_controller2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Banques $banque): Response
    {
        $form = $this->createForm(BanquesType::class, $banque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('banques_controller2_index');
        }

        return $this->render('banques_controller2/edit.html.twig', [
            'banque' => $banque,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'banques_controller2_delete', methods: ['POST'])]
    public function delete(Request $request, Banques $banque): Response
    {
        if ($this->isCsrfTokenValid('delete'.$banque->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($banque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('banques_controller2_index');
    }
}
