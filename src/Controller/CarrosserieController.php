<?php

namespace App\Controller;

use App\Entity\Carrosserie;
use App\Form\CarrosserieType;
use App\Repository\CarrosserieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/carrosserie')]
class CarrosserieController extends AbstractController
{
    #[Route('/', name: 'app_carrosserie_index', methods: ['GET'])]
    public function index(CarrosserieRepository $carrosserieRepository): Response
    {
        return $this->render('carrosserie/index.html.twig', [
            'carrosseries' => $carrosserieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_carrosserie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $carrosserie = new Carrosserie();
        $form = $this->createForm(CarrosserieType::class, $carrosserie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($carrosserie);
            $entityManager->flush();

            return $this->redirectToRoute('app_carrosserie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carrosserie/new.html.twig', [
            'carrosserie' => $carrosserie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_carrosserie_show', methods: ['GET'])]
    public function show(Carrosserie $carrosserie): Response
    {
        return $this->render('carrosserie/show.html.twig', [
            'carrosserie' => $carrosserie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_carrosserie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Carrosserie $carrosserie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarrosserieType::class, $carrosserie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_carrosserie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carrosserie/edit.html.twig', [
            'carrosserie' => $carrosserie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_carrosserie_delete', methods: ['POST'])]
    public function delete(Request $request, Carrosserie $carrosserie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carrosserie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($carrosserie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_carrosserie_index', [], Response::HTTP_SEE_OTHER);
    }
}
