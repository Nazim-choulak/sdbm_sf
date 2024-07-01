<?php

namespace App\Controller;

use App\Entity\TypeBiere;
use App\Form\TypeBiereType;
use App\Repository\TypeBiereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/typebiere')]
class TypeBiereController extends AbstractController
{
    #[Route('/', name: 'app_type_biere_index', methods: ['GET'])]
    public function index(TypeBiereRepository $typeBiereRepository): Response
    {
        return $this->render('type_biere/index.html.twig', [
            'type_bieres' => $typeBiereRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_biere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeBiere = new TypeBiere();
        $form = $this->createForm(TypeBiereType::class, $typeBiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeBiere);
            $entityManager->flush();

            return $this->redirectToRoute('app_type_biere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_biere/new.html.twig', [
            'type_biere' => $typeBiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_biere_show', methods: ['GET'])]
    public function show(TypeBiere $typeBiere): Response
    {
        return $this->render('type_biere/show.html.twig', [
            'type_biere' => $typeBiere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_biere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeBiere $typeBiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeBiereType::class, $typeBiere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_type_biere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_biere/edit.html.twig', [
            'type_biere' => $typeBiere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_biere_delete', methods: ['POST'])]
    public function delete(Request $request, TypeBiere $typeBiere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeBiere->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($typeBiere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_type_biere_index', [], Response::HTTP_SEE_OTHER);
    }
}
